<?php

namespace App\Controllers;

use App\Models\Applicant;
use App\Models\Recruiter;
use App\Models\Jobs;


class ApplicantC extends BaseController
{

    public function dashboard()
    {
        $applicantX = session()->get('applicant');
        $email = $applicantX['email'];
        $applicantModel = new Applicant();
        $applicant = $applicantModel->where('email', $email)->first();

        $applicants = $applicantModel->findAll();


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
        return view('Applicants/Dashboard', ['applicant' => $applicant, 'applicants' => $applicants,
        'approvedApplicantsCount' => $approvedApplicantsCount,
        'jobs' => $jobs,
        'applicants' => $applicants,
        'recruiters' => $recruiters]);
    }


    public function submitA()
    {
        $job_post_id = $this->request->getPost('job_post_id');
        $experience = $this->request->getPost('experience');
        $resume = $this->request->getFile('resume');

        $db = db_connect();

        $builder = $db->table('job_post');
        $builder->select('experience');
        $builder->where('job_post_id', $job_post_id);
        $result = $builder->get()->getRow();

        if ($result === null) {
            echo '<script>alert("Job post not found.");</script>';
            return;
        }

        $applicantId = session()->get('applicant')['applicant_id'];

        $builder = $db->table('application');
        $builder->select('application_id');
        $builder->where('job_post_id', $job_post_id);
        $builder->where('applicant_id', $applicantId);
        $existingApplication = $builder->get()->getRow();

        if ($existingApplication) {
            echo '<script>alert("You have already applied for this job.");</script>';
            return $this->yourApplications();


        }

        $data = [
            'status' => 'Applied',
            'experience' => $experience,
            'job_post_id' => $job_post_id,
            'applicant_id' => $applicantId,
            'resume' => $resume->getName()
        ];

        $builder = $db->table('application');
        $builder->insert($data);

        $insertedId = $db->insertID();

        if ($insertedId > 0) {
            $newName = $resume->getName();
            $path = "resumes/{$applicantId}";
            $resume->move($path, $newName);
            echo '<script>alert("Application submitted successfully.");</script>';
        } else {
            echo '<script>alert("Failed to submit application. Please try again.");</script>';

            $error = $db->error();
            echo "Query: " . $db->getLastQuery() . "<br>";
            echo "Error: " . $error['message'] . "<br>";
        }

        return $this->dashboard();
    }
    public function updateAccount()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phoneNumber = $_POST['phone_number'];
        $address = $_POST['address'];
        $dateOfBirth = $_POST['date_of_birth'];

        $applicantX = session()->get('applicant');
        $id = $applicantX['applicant_id'];

        $db = db_connect();
        $success = $db->table('applicant')
            ->where('applicant_id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'phone_number' => $phoneNumber,
                'address' => $address,
                'date_of_birth' => $dateOfBirth
            ]);

        if ($success) {

            echo "<script>alert('Profile updated successfully.')</script>";

        } else {
            echo "<script>alert('Failed to update profile. Please try again.')</script>";

        }

        return view('Applicants/Settingz');
    }



    public function applyJob($job_post_id)
    {
        $db = db_connect();
        $builder = $db->table('job_post');
        $builder->select('job_post.*, recruiter.*');
        $builder->join('recruiter', 'recruiter.recruiter_id = job_post.recruiter_id');
        $builder->where('job_post.job_post_id', $job_post_id);
        $result = $builder->get()->getRow();

        if ($result === null) {
            echo "<script>alert('Job Not Found')</script>";
        }


        $data['job'] = $result;

        return view('Applicants/jobView', $data);
    }




    public function SearchingJobs()
    {
        $keywords = $this->request->getPost('keywords');
        $location = $this->request->getPost('location');

        $db = db_connect();
        $query = $db->query("
        SELECT
          job_post.job_post_id,
          job_post.published_date,
          job_post.location,
          job_post.skills_required,
          job_post.description,
          job_post.position,
          job_post.salary,
          job_post.experience,
          job_post.status,
          job_post.recruiter_id,
          recruiter.company_name
        FROM job_post
        JOIN recruiter ON job_post.recruiter_id = recruiter.recruiter_id
        WHERE job_post.position LIKE '%$keywords%'
        
          AND job_post.location LIKE '%$location%'
    ");
        $data['results'] = $query->getResult();

        return view('Applicants/SearchResults', $data);

    }

    public function yourApplications()
    {
        $applicantX = session()->get('applicant');
        $id = $applicantX['applicant_id'];
        $db = db_connect();
        $query = $db->table('application')->where('applicant_id', $id)->get();
        $applications = $query->getResult();


        return view('Applicants/yourApplications', ['applications' => $applications]);
    }

    public function searchJobs()
    {

        $keywords = "";
        $location = "";

        $db = db_connect();
        $query = $db->query("
        SELECT
          job_post.job_post_id,
          job_post.published_date,
          job_post.location,
          job_post.skills_required,
          job_post.description,
          job_post.position,
          job_post.salary,
          job_post.experience,
          job_post.status,
          job_post.recruiter_id,
          recruiter.company_name
        FROM job_post
        JOIN recruiter ON job_post.recruiter_id = recruiter.recruiter_id
        WHERE job_post.position LIKE '%$keywords%'
          AND job_post.location LIKE '%$location%'
    ");
        $data['results'] = $query->getResult();

        return view('Applicants/SearchResults', $data);

    }
    public function deleteApplication()
    {
        $application_id = $this->request->getPost('application_id');
        $db = db_connect();

        $builder = $db->table('application');
        $builder->where('application_id', $application_id);
        $builder->delete();

        echo '<script>alert("Application deleted successfully.");</script>';
        return $this->yourApplications();
    }
    public function AccountSettings()
    {

        return view('Applicants/Settingz');
    }

    public function changePassword()
    {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword !== $confirmPassword) {
            echo "<script>alert('New password and confirm password do not match.')</script>";
            return view('Applicants/Settingz');
        }

        $recruiterId = session()->get('applicant')['applicant_id'];

        $db = db_connect();

        $query = $db->table('applicant')
            ->select('password')
            ->where('applicant_id', $recruiterId)
            ->get();
        $recruiter = $query->getRow();

        if ($currentPassword === $recruiter->password) {
            $success = $db->table('applicant')
                ->where('applicant_id', $recruiterId)
                ->update(['password' => $newPassword]);

            if ($success) {
                echo "<script>alert('Password changed successfully.')</script>";
            } else {
                echo "<script>alert('Failed to change password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Invalid current password.')</script>";
        }

        return view('Applicants/Settingz');
    }


}