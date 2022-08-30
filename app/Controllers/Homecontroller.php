<?php
namespace App\Controllers;



class Homecontroller extends BaseController {
    public function index()
    {
        $data = [
            'page_title' => 'welcome  to My Web page',
            'page_heading' => 'Codelgniter 4 Training',
        ];
                return view('site\layouts\content',$data);
    
    }


    public function about(){
        $data = [
            'page_title' => 'welcome  to My Web page',
            'page_heading' => 'Codelgniter 4 Training',
        ];

        echo view('site\layouts\header',$data);
        echo view('site\layouts\about');
        echo view('site\layouts\footer');
    }
}

?>