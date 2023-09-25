<?php
namespace App\Models;
use CodeIgniter\Model;

class Applicant extends Model
{
protected $table = 'Applicant';
protected $primaryKey = 'applicant_id';
protected $useAutoIncrement = true;
protected $allowedFields = [
    'applicant_id','name','password','email','gender','phone_number','address','date_of_birth'];

}