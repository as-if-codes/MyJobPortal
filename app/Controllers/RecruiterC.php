<?php

namespace App\Controllers;
use App\Models\Recruiter;
use App\Models\Jobs;
use App\Models\Applicant;


class RecruiterC extends BaseController
{

    public function dashboard()
    {
        $recruitertemp = session()->get('recruiter');
        $email = $recruitertemp['email'];

        $recruiterModel = new Recruiter();
        $recruiter = $recruiterModel->where('email', $email)->first();

         
        $jobModel = new Jobs();
        $applicantModel = new Applicant();
        $applicants = $applicantModel->findAll();
        $jobModel = new Jobs();
        $jobs= $jobModel->findAll();
        $recruiterModel = new Recruiter();
        $recruiters = $recruiterModel->findAll();
        $approvedApplicantsCount = db_connect()
        ->table('applicant')
        ->join('application', 'application.applicant_id = applicant.applicant_id')
        ->where('application.status', 'approved')
        ->countAllResults();

        return view('Recruiters/Dashboard', [
            'approvedApplicantsCount' => $approvedApplicantsCount,
            'jobs' => $jobs,
            'applicants' => $applicants,
            'recruiters' => $recruiters
        ]);}
    public function jobpost()
    {

        return view('Recruiters/Postjob');

    }

    public function YourJobs()
    {
        $recruiterId = session()->get('recruiter')['recruiter_id'];

        $db = db_connect();

        $query = $db->table('job_post')
            ->select('job_post.*, COUNT(application.application_id) as application_count')
            ->join('application', 'application.job_post_id = job_post.job_post_id', 'left')
            ->where('recruiter_id', $recruiterId)
            ->groupBy('job_post.job_post_id')
            ->get();

        $jobs = $query->getResult();

        return view('Recruiters/YourJobs', ['jobs' => $jobs]);
    }
    public function updateStatus()
    {
        $applicationId = $this->request->getPost('application_id');
        $newStatus = $this->request->getPost('status');

        $db = db_connect();
        $builder = $db->table('application');
        $builder->set('status', $newStatus);
        $builder->where('application_id', $applicationId);

        if ($builder->update()) {
            echo '<script>alert("Status updated successfully.");</script>';
        } else {
            echo '<script>alert("Failed to update status. Please try again.");</script>';
        }

        return $this->YourJobs();
    }

    public function ApplicationView($jobId, $r_id)
    {
        $recruiterId = session()->get('recruiter')['recruiter_id'];

        if ($recruiterId == $r_id) {
            $db = db_connect();

            $applicationsQuery = $db->table('application')->where('job_post_id', $jobId)->get();
            $applications = $applicationsQuery->getResult();

            if (count($applications) > 0) {
                $applicantIds = array_column($applications, 'applicant_id');
                $applicantsQuery = $db->table('applicant')->whereIn('applicant_id', $applicantIds)->get();
                $applicants = $applicantsQuery->getResult();

                $data = [];
                foreach ($applications as $application) {
                    $applicantId = $application->applicant_id;
                    foreach ($applicants as $applicant) {
                        if ($applicant->applicant_id == $applicantId) {
                            $data[] = [
                                'application' => $application,
                                'applicant' => $applicant
                            ];
                            break;
                        }
                    }
                }

                return view('Recruiters/ApplicationView', ['data' => $data]);
            } else {
                echo '<script>alert("No applications found for this job.");</script>';

                return $this->YourJobs();

            }
        } else {

            echo '<script>alert("Session terminated");</script>';
            return view('LoginPage');
        }
    }



    public function SaveJobPost()
    {
        if ($this->request->getMethod() == 'post') {
            $location = $this->request->getPost('location');
            $skillsRequired = $this->request->getPost('skills_required');
            $description = $this->request->getPost('description');
            $position = $this->request->getPost('position');
            $salary = $this->request->getPost('salary');
            $experience = $this->request->getPost('experience');
            $recruiterId = $this->request->getPost('recruiter_id');

            $data = [
                'location' => $location,
                'skills_required' => $skillsRequired,
                'description' => $description,
                'position' => $position,
                'salary' => $salary,
                'experience' => $experience,
                'recruiter_id' => $recruiterId
            ];

            $db = db_connect();

            $db->table('job_post')->insert($data);

            echo '<script>alert("Job  posted  successfully.");</script>';
            return view('Recruiters/Postjob');


        }

    }

    public function RAccountSettings()
    {

        return view('Recruiters/Settingz');
    }
    public function RupdateAccount()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $companyName = $_POST['company_name'];
        $phoneNumber = $_POST['phone_number'];
        $address = $_POST['address'];
        $about = $_POST['about'];

        $recruiter = session()->get('recruiter');
        $id = $recruiter['recruiter_id'];

        $db = db_connect();
        $success = $db->table('recruiter')
            ->where('recruiter_id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'company_name' => $companyName,
                'phone_number' => $phoneNumber,
                'company_address' => $address,
                'about' => $about
            ]);

        if ($success) {
            echo "<script>alert('Profile updated successfully.')</script>";
        } else {
            echo "<script>alert('Failed to update profile. Please try again.')</script>";
        }

        return view('Recruiters/Settingz');
    }
    public function changePassword()
    {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword !== $confirmPassword) {
            echo "<script>alert('New password and confirm password do not match.')</script>";
            return view('Recruiters/Settingz');
        }
    
        $recruiterId = session()->get('recruiter')['recruiter_id'];
    
        $db = db_connect();
    
        $query = $db->table('recruiter')
            ->select('password')
            ->where('recruiter_id', $recruiterId)
            ->get();
        $recruiter = $query->getRow();
    
        if ($currentPassword === $recruiter->password) {
            $success = $db->table('recruiter')
                ->where('recruiter_id', $recruiterId)
                ->update(['password' => $newPassword]);
    
            if ($success) {
                echo "<script>alert('Password changed successfully.')</script>";
            } else {
                echo "<script>alert('Failed to change password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Invalid current password.')</script>";
        }
    
        return view('Recruiters/Settingz');
    }
    

}