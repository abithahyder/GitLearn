<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table ='login';
    protected $allowedFields = ['user_name','password','user_type','rid'];

    public function getUser($user){
        return $this->where('user_name',$user)->first();
    }

 }

 ?>