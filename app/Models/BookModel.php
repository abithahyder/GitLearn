<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model{
    protected $table ='books';
    protected $allowedFields = ['title','author','issue_no','book_stock'];

 public function getRecords() {
    return $this->orderBy('id','DESC')->findAll();
 }

 public function getRow($id){
    // SELECT * FROM books where id = $id
   return $this->where('id',$id)->first();
 }

}

?>