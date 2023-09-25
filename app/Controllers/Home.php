<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Applicant;
use App\Models\Recruiter;
use App\Models\Jobs;

class Home extends BaseController
{


    public function index()
    {
        return view('welcome_message');
    }
    public function Register()
    {
        return view('Register');
    }
    public function ApplicantRegister()
    {
        $data = [
            'meta_title' => 'New Data',
            'title' => 'New Record',
        ];
        if ($this->request->getMethod() == 'post') {

            $model = new Applicant();

            if ($model->save($_POST)) {
                echo '<script>alert("Applicant registered successfully.");</script>';
            } else {
                echo '<script>alert("Failed to register applicant.");</script>';
                return view('Register');
            }

        }
        return view('LoginPage');

    }
    public function RRegister()
    {
        return view('RRegister');
    }
  
    public function LoginForm()
    {
        return view('LoginPage');
    }

    public function RecruiterRegister()
    {
          $data = [    'meta_title' => 'New Data',
            'title' => 'New Record',
        ];
        if ($this->request->getMethod() == 'post') {

            $model = new Recruiter();

            if ($model->save($_POST)) {
                echo '<script>alert("Recruiter registered successfully.");</script>';
            } else {
                echo '<script>alert("Failed to register Recruiter.");</script>';
                return view('RRegister');
            }

        }
        return view('LoginPage');

    }

    public function logout()
    {
        $session = \Config\Services::session();
        
        session_destroy();
       
        return view('welcome_message');

    }
    public function LoginVerify()
    {
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $adminModel = new Admin();
            $admin = $adminModel->where('email', $email)->first();
            if ($admin && $admin['email'] == $email && $admin['password'] == $password) {
                session()->set('admin', $admin);

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
                return view('Admin/Dashboard', [
                    'approvedApplicantsCount' => $approvedApplicantsCount,
                    'jobs' => $jobs,
                    'applicants' => $applicants,
                    'recruiters' => $recruiters
                ]);
            }

         

            $recruiterModel = new Recruiter();
            $recruiter = $recruiterModel->where('email', $email)->first();
            if ($recruiter && $recruiter['email'] == $email && $recruiter['password'] == $password) {
                session()->set('recruiter', $recruiter);

                  
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


                
               $applicantModel = new Applicant();
            $applicant = $applicantModel->where('email', $email)->first();
            if ($applicant && $applicant['email'] == $email && $applicant['password'] == $password) {
                session()->set('applicant', $applicant);


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

                return view('Applicants/Dashboard', ['applicant' => $applicant,
                'approvedApplicantsCount' => $approvedApplicantsCount,
                'jobs' => $jobs,
                'applicants' => $applicants,
                'recruiters' => $recruiters]);
            }


            echo '<script>alert("Invalid Credentials");</script>';
            return view('LoginPage');
        }
    }
    
    public function BrowseJobs()
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
 
        return view('BrowseJobs', $data);

    }
   
    public function loginpopup(){
        echo '<script>alert("Please login to apply");</script>';
        return view('LoginPage');

    }
  

}