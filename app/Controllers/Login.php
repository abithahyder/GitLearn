<?php
namespace App\Controllers;

use App\Models\RegisterModel;
use App\Models\UserModel;

class Login extends BaseController{
    public function index(){
$session = session();
$usermodel = new UserModel();
        $data = [];
        if($this->request->getMethod()=='post'){
            $rules = [
                'user' => 'required',
                'pass'=> 'required|min_length[8]',
            ];
           if( $this->validate($rules)){
                $user = $this->request->getvar('user');
                $pass = $this->request->getVar('pass');
               $dataa =$usermodel->getUser($user);
            if($dataa){
                $passw =$dataa['password'];
             
                $authent = password_verify($passw,$pass);
              
              var_dump($p);
                if($authent){
                    $ses_data = [
                        'rid' => $dataa['rid'],
                        'id' => $dataa['lid'],
                        'type'=>$dataa['user_type'],
                        'username' => $dataa['user_name'],
                        'isLoggedIn' => TRUE

                    ];
                    $session->set($ses_data);
                    return redirect()->to('/books');
                }
                else{
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    //return redirect()->to('/tt');
                }

            }
            else{
                $session->setFlashdata('msg', 'User does not exist.');
                return redirect()->to('/test');
            }
           }
           else{
            $data['validation'] = $this->validator;
           }
          
        }
        return view('book/layout/login');  
    }
    public function register(){
        $session = \Config\Services::session();
        helper(['form']);
        $data =[];
        if($this->request->getMethod()=='post'){
            $rules = [
                'firstname' => 'required',
                'last_name' =>'required',
                'gender' => 'required',
                'country'=>'required',
                'phone' =>'required',
                'state'=>'required',
                'pass'=> 'required|min_length[8]',
                'cpass' => 'matches[pass]'
            ];
           if( $this->validate($rules)){
            $model = new RegisterModel();
              
          $res=  $model->save([
             'first_name' => $this->request->getPost('firstname'),
             'last_name' => $this->request->getPost('last_name'),
             'gender' => $this->request->getPost('gender'),
             'phone' =>$this->request->getPost('phone'),
             'country'=>$this->request->getPost('country'),
             'state' =>$this->request->getPost('state'),
             'email' =>$this->request->getPost('phone'),
             'address' => $this->request->getPost('address'),
            ]);
            if($res){
                $lmodel = new UserModel();
                 $id = $model->getId();
                  if($id==""){
                    $id=3;
                  }
                $lmodel->save([
                    'rid' => $id,
                   'user_name' =>$this->request->getPost('email'),
                   'password' =>$this->request->getPost('pass'),
                   'user_type' => 'user',
                ]);
            }
            $session->setFlashdata('success','Winner Winner Chicken dinner,record added successfully');
          //  return redirect()->to('/books'); 
           }
        
        else{
            $data['validation'] = $this->validator;
        }
    }
        return view('book/layout/register',$data);
    }
}
?>