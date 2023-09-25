<?php
namespace App\Models;
use CodeIgniter\Model;

class Jobs extends Model
{
protected $table = 'job_post';
protected $primaryKey = 'job_post_id';
protected $useAutoIncrement = true;
protected $allowedFields = 
[ 'job_post_id','published_date','location','skills_required','description','position','salary','experience','status','recruiter_id'];
 
}