<?php
namespace App\Controllers;
use \CodeIgniter\Controller;
use \CodeIgniter\View\Table;
class Blog extends BaseController{
    public function indexx(){
        $data = [
            'page_title' => 'Codelginiter',
            'Content' => 'The content on the page',
            'footer' => 'the footer of the page',
            'subjects_list' =>[
                ['subject'=> 'HTML','abbr'=>'Hyper Text Markup Language'],
                ['subject'=> 'CSS', 'abbr'=>'Cascading Style Sheet'],
                ['subject'=> 'JSON', 'abbr'=>'Javascript Object Notation'],
            ],
                "status"=>false,
                
                
        ];
       
        return view('blog/main',$data);
    }
    public function tab(){
        $table = new Table();

        // $data = [
        //     ['Name','City','State'],
        //     ['Arun','thrissur','Kerala'],
        //     ['Ajay','Kozhikode','kerala'],
        //     ['Binoy','Ernamkulam','kerala'],
        // ];
        $table->setHeading(['Name','City','State']);
        $table->addRow(['Arun','thrissur','Kerala']);
$table->addRow(['Ajay','Kozhikode','kerala']);
 $table->addRow(['Binoy','Ernamkulam','kerala']);
 $records['users']=$table->generate();
 return view('blog/list',$records);
    }
public function vfiltr(){
    $parser = \Config\Services::parser();
    $data = [
        'page_title'=> 'My Blog Title',
        'page_heading'=> 'My Blog Heading',
        'date' => '15-03-2022',
    ];
    $parser->setData($data);
    $parser->render('filterview');
   // return view('blog/filterview',$data);
}
   public function index(){
    helper(['form','cookie','html','array']);
    //helper('form');
    //helper('html');
   // helper('cookie');

//     echo form_open();
//     echo form_input("username","test123");
// echo base_url();
// echo current_url();

echo getRandom([10,20,30,40,50,60]);
   }

}
?>