<?php
namespace App\Models;
use CodeIgniter\Model;

class MemberModel extends Model{
    protected $table ='membership';
    protected $allowedFields = ['name','Id_num','age','address','phone'];

 public function getRecords() {
    return $this->orderBy('id','DESC')->findAll();
 }
 public function getMemberid() {
   return $this->orderBy('Id_num','ASC')->findAll();
}
 public function getRow($id){
    // SELECT * FROM books where id = $id
   return $this->where('id',$id)->first();
 }

}

?>