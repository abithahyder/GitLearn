<?php 
namespace App\Controllers;
use App\Models\BookModel;

class Book extends BaseController{
    public function index(){
        echo view('book\header');
     echo view('book/main');
     echo view('book/footer');
    }
    public function indexx(){
        $session = \Config\Services::session();
        $data['session'] = $session;
        $model = new BookModel();
        $booksarray=$model->getRecords();
        $data['books'] = $booksarray;
         echo view('book/header');
          echo view('book/list',$data);
          echo view('book/footer');
    }
    public function create(){
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if($this->request->getMethod() == 'post'){
           
            $input =$this->validate([
                'bname' => ['label'=> 'Name', 'rules'=>'required|min_length[5]'],
                'bauthor' => ['label'=> 'Author','rules'=>'required|min_length[5]'],
                'bissno' => ['label'=>'ISB_NO','rules'=>'required',],
                'bno' => ['label'=>'Book Number','rules'=>'required'],
            ]);

            if($input == true){           
               // echo "Form Validated Successfully";
               $model = new BookModel();
              
               $model->save([
                'title' => $this->request->getPost('bname'),
                'author' => $this->request->getPost('bauthor'),
                'issue_no' => $this->request->getPost('bissno'),
                'book_stock' =>$this->request->getPost('bno')
               ]);
               $session->setFlashdata('success','Winner Winner Chicken dinner,record added successfully');
               return redirect()->to('/books');
            }
            else{
                $data['validation'] =$this->validator;
            }
        
       
        }
            
                     return view('book/create',$data);
    }
   
    public function edit($id){
        $session = \Config\Services::session();
        helper('form');
        $model = new BookModel();
       $book= $model->getRow($id);
       if(empty($book)){
        $session->setFlashdata('error','Record not found');
        return redirect()->to('/books');
       }
      
       $data = [];
       $data['book'] = $book;
        if($this->request->getMethod() == 'post'){
           
            $input =$this->validate([
                'bname' => ['label'=> 'Name', 'rules'=>'required|min_length[5]'],
                'bauthor' => ['label'=> 'Author','rules'=>'required|min_length[5]'],
                'bissno' => ['label'=>'ISB_NO','rules'=>'required',],
                'bno' => ['label'=>'Book Number','rules'=>'required'],
            ]);

            if($input == true){           
               // echo "Form Validated Successfully";
               $model = new BookModel();
              
               $model->update($id,[
                'title' => $this->request->getPost('bname'),
                'author' => $this->request->getPost('bauthor'),
                'issue_no' => $this->request->getPost('bissno'),
                'book_stock' =>$this->request->getPost('bno')
               ]);
               $session->setFlashdata('success','Winner Winner Chicken dinner,record updated successfully');
               return redirect()->to('/books');
            }
            else{
                $data['validation'] =$this->validator;
            }
        
       
        }
            
                     return view('book/edit',$data);
    }
    public function delete($id){
        $session = \Config\Services::session();
        
        $model = new BookModel();
        $book= $model->getRow($id);

        if(empty($book)){
            $session->setFlashdata('error', 'Record not found');
            return redirect()->to('/books');
        }
        $model->delete($id);
        $session->setFlashdata('success', 'Record Deleted Successfully');
        return redirect()->to('/books');
    }

    }
