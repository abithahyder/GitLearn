<?php
namespace App\Models;
use CodeIgniter\Model;

class InbookModel extends Model{
    protected $table ='in_out';
    protected $allowedFields = ['bid','mid','type'];

 public function getRecords() {
    return $this->orderBy('id','DESC')->findAll();
 }

 public function getRow($id){
    // SELECT * FROM books where id = $id
   return $this->where('id',$id)->first();
 }

}

?>