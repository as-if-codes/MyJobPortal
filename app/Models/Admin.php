<?php
namespace App\Models;
use CodeIgniter\Model;

class Admin extends Model
{
protected $table = 'admin';
protected $primaryKey = 'admin_id';
protected $useAutoIncrement = true;
protected $allowedFields = 
[ 'admin_id','name','password','email','phone_number'];

}