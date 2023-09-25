<?php
namespace App\Controllers;

use App\Models\Jobs;
use App\Models\Admin;
use App\Models\Recruiter;
use App\Models\Applicant;

class AdminC extends BaseController
{
    public function dashboard()
    {

        $email = session()->get('email');

        $adminModel = new Admin();
        $admin = $adminModel->where('email', $email)->first();

        $applicantModel = new Applicant();
        $applicants = $applicantModel->findAll();

        $jobModel = new Jobs();
        $jobs = $jobModel->findAll();

        $recruiterModel = new Recruiter();
        $recruiters = $recruiterModel->findAll();

        $approvedApplicantsCount = db_connect()
            ->table('applicant')
            ->join('application', 'application.applicant_id = applicant.applicant_id')
            ->where('application.status', 'approved')
            ->countAllResults();

        return view('Admin/Dashboard', [
            'approvedApplicantsCount' => $approvedApplicantsCount,
            'jobs' => $jobs,
            'admin' => $admin,
            'applicants' => $applicants,
            'recruiters' => $recruiters
        ]);
    }
    public function jobList()
    {

        $email = session()->get('email');

        $adminModel = new Admin();
        $admin = $adminModel->where('email', $email)->first();


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
       
    ");
        $data['results'] = $query->getResult();

        return view('Admin/job_list', ['results' => $data['results'], 'admin' => $admin]);

    }
    public function SettingsAdmin()
    {
        return view('Admin/Settingz');


    }
    public function updateAccount()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $phoneNumber = $_POST['phone_number'];
        $Admin = session()->get('admin');
        $id = $Admin['admin_id'];

        $db = db_connect();
        $success = $db->table('admin')
            ->where('admin_id', $id)
            ->update([
                'name' => $name,
                'email' => $email,

                'phone_number' => $phoneNumber,

            ]);

        if ($success) {

            echo "<script>alert('Profile updated successfully.')</script>";

        } else {
            echo "<script>alert('Failed to update profile. Please try again.')</script>";

        }

        return view('Admin/Settingz');
    }
    public function AdeleteJob()
    {
        $jobId = $this->request->getPost('job_post_id');

        try {
            $db = db_connect();
            $builder = $db->table('job_post');
            $builder->where('job_post_id', $jobId);
            $builder->delete();
            if ($builder->delete()) {
                echo '<script>alert("Job deleted successfully.");</script>';
                return $this->jobList();
            } else {
                echo '<script>alert("Unable to delete job post. It may have associated applications.");</script>';
                return $this->jobList();

            }

        } catch (\Exception $e) {
            echo '<script>alert("Unable to delete job post. It may have associated applications.");</script>';
            return $this->jobList();
        }
    }
    public function changePassword()
    {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword !== $confirmPassword) {
            echo "<script>alert('New password and confirm password do not match.')</script>";
            return view('Admin/Settingz');
        }

        $recruiterId = session()->get('admin')['admin_id'];

        $db = db_connect();

        $query = $db->table('admin')
            ->select('password')
            ->where('admin_id', $recruiterId)
            ->get();
        $recruiter = $query->getRow();

        if ($currentPassword === $recruiter->password) {
            $success = $db->table('admin')
                ->where('admin_id', $recruiterId)
                ->update(['password' => $newPassword]);

            if ($success) {
                echo "<script>alert('Password changed successfully.')</script>";
            } else {
                echo "<script>alert('Failed to change password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Invalid current password.')</script>";
        }

        return view('Admin/Settingz');
    }
    public function ReportsG()
    {
        $db = db_connect();

        // Application Report
        $applicationQuery = $db->query("
            SELECT MONTH(applied_date) AS month, COUNT(*) AS application_count
            FROM application
            GROUP BY MONTH(applied_date)
        ");

        if ($applicationQuery === false) {
            echo "<script>alert('Failed to generate application report. Please try again.')</script>";
            return view('Admin/Settingz');
        }

        $data['applicationReport'] = $applicationQuery->getResult();


        $jobPostingsQuery = $db->query("
        SELECT MONTH(published_date) AS month, COUNT(*) AS job_postings_count
        FROM job_post
        GROUP BY MONTH(published_date)
        ");

        if ($jobPostingsQuery === false) {
            echo "<script>alert('Failed to generate job postings report. Please try again.')</script>";
            return view('Admin/Settingz');
        }

        $data['jobPostingsReport'] = $jobPostingsQuery->getResult();

        

        return view('Admin/report', $data);
    }

    public function rListNOTWORKING()
    {
        $recruiterModel = new Recruiter();
        $recruiters1 = $recruiterModel->findAll();
        $email = session()->get('email');

        $adminModel = new Admin();
        $admin = $adminModel->where('email', $email)->first();

        $data['recruiters1'] = $recruiters1;
        return view('Admin/Recruiterslist', $data);
    }
    public function rList()
    {
        $recruiterModel = new Recruiter();
        $recruiters = $recruiterModel->findAll();
        $email = session()->get('email');



        return view('Admin/Recruiterslist', ['recruiters' => $recruiters]);
    }


    public function ReportTwo()
    {
        $db = db_connect();
    
         $genderQuery = $db->query("SELECT gender, 
                                          COUNT(*) AS gender_count,
                                          (COUNT(*) / (SELECT COUNT(*) FROM applicant)) * 100 AS gender_percentage
                                   FROM applicant
                                   GROUP BY gender");
        $genderData['gender_distribution'] = $genderQuery->getResult();
     
        $topRecruitersQuery = $db->query("SELECT r.company_name, r.name, COUNT(j.job_post_id) AS total_jobs
                                          FROM recruiter r
                                          LEFT JOIN job_post j ON r.recruiter_id = j.recruiter_id
                                          GROUP BY r.company_name, r.name
                                          ORDER BY total_jobs DESC
                                          LIMIT 3");
        $topRecruitersData['top_recruiters'] = $topRecruitersQuery->getResult();
    
       
        return view('Admin/ReportTwo', [
            'gender_distribution' => $genderData['gender_distribution'],
            'top_recruiters' => $topRecruitersData['top_recruiters']
        ]);
    }
    

    public function topThreeR()
    {
        $db = db_connect();
        $query = $db->query("SELECT r.company_name, r.name, COUNT(j.job_post_id) AS total_jobs
        FROM recruiter r
        LEFT JOIN job_post j ON r.recruiter_id = j.recruiter_id
        GROUP BY r.company_name, r.name
        ORDER BY total_jobs DESC
        LIMIT 3
    ");
        $data['results'] = $query->getResult();



        echo json_encode($data);
    }
}