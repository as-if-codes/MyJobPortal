<?php
namespace App\Models;
use CodeIgniter\Model;

class Recruiter extends Model
{
protected $table = 'recruiter';
protected $primaryKey = 'recruiter_id';
protected $useAutoIncrement = true;
protected $allowedFields = 
[ 'recruiter_id','name','password','email','phone_number','company_name','company_address','about'];

}