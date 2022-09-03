<?php
namespace App\Models;
use CodeIgniter\Model;


class RegisterModel extends Model {
    protected $table ='register';
    protected $allowedFields = ['first_name','last_name','email','address','phone','gender','country','state'];
    
public function getId(){
    return  $this->getInsertID();
}

}
