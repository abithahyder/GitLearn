<?php 
namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MemberModel;

use App\Models\InbookModel;


class Issuebook extends BaseController{
    public function index(){
        $memmodel = new MemberModel();
        $bookmodel = new BookModel();
        $data['memid'] = $memmodel->getMemberid();
        $data['book']=$bookmodel->getRecords();
        echo view('book\header');
     echo view('book/issbook',$data);
     echo view('book/footer');
    }

    public function issbook(){
        $inmodel = new InbookModel();
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if($this->request->getMethod() == 'post'){
           
            $input =$this->validate([
                'mid' => ['label'=> 'Member ID', 'rules'=>'required'],
                'bid' => ['label'=> 'Book Taken','rules'=>'required'],
                
            ]);

            if($input == true){           
                echo "Form Validated Successfully";
               
              $id = $this->request->getPost('bid');
              $in= $inmodel->save([
                'bid' => $this->request->getPost('bid'),
                'type' => $this->request->getPost('mtype'),
                'mid' => $this->request->getPost('mid'),
                
               ]);
               if($in){
                $bookmodel=new BookModel();
               $v= $bookmodel->settake($id);
               echo $v;
            }
               $session->setFlashdata('success','Book intake/Return,record added successfully');
               return redirect()->to('/books/issbook');
            }
            else{
                $data['validation'] =$this->validator;
            }
        
       
        }
            
                     return view('book/member',$data);
    }
}
?>