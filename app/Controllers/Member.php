<?php 
namespace App\Controllers;
use App\Models\MemberModel;

class Member extends BaseController{
    public function index(){
        echo view('book\header');
     echo view('book/member');
     echo view('book/footer');
    }
    public function create(){
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if($this->request->getMethod() == 'post'){
           
            $input =$this->validate([
                'mname' => ['label'=> 'Name', 'rules'=>'required|min_length[5]'],
                'midno' => ['label'=> 'Member ID','rules'=>'required|min_length[5]'],
                'maddress' => ['label'=>'Address','rules'=>'required',],
                'mage' => ['label'=>'Age','rules'=>'required'],
                'mphone' =>['label'=>'Mobile', 'rules'=>'required'],
            ]);

            if($input == true){           
                echo "Form Validated Successfully";
               $model = new MemberModel();
              
               $model->save([
                'name' => $this->request->getPost('mname'),
                'age' => $this->request->getPost('mage'),
                'Id_num' => $this->request->getPost('midno'),
                'address' =>$this->request->getPost('maddress'),
                'phone' =>$this->request->getPost('mphone'),
               ]);
               $session->setFlashdata('success','Member ship,record added successfully');
               return redirect()->to('/book/addmem');
            }
            else{
                $data['validation'] =$this->validator;
            }
        
       
        }
            
                     return view('book/member',$data);
    }
}

?>