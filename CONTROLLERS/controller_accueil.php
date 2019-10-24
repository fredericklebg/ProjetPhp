<?php

require_once 'MODELS/models_user.php';
require_once 'VIEWS/view_template.php';


class controller_accueil extends controller_main
{
    private $user;
    private $disc;
    private $msg;

    public function index()
    {
        $vue = new Vue('accueil');
        $vue->generer(array());

    }
    public function __construct() {
        $this->disc= new discussion();
        $this->msg= new message();
        $this->user = new user();
    }

    public function changePassView()
    {
        $vue = new Vue('changePass');
        $vue->generer(array());
    }

    public function changePass()
    {
        $this->user->changePassword();
        $_SESSION['isLogin'] = 'non';
        $vue = new Vue('passChanged');
        $vue->generer(array());
    }

//    public function showDiscussion()
//    {
//        $query=$this->disc->showDisc();
//
//
//
//
//
//
//    }


}











//
//spl_autoload_register(function ($class_name) {
//    include  '../MODELS/models_' . $class_name . '.php';
//});
//
//session_start();
//$action = $_POST['action'];
//
//$user=new user;
//$disc = new discussion;
//
//
//if($action =='inscription')
//{
//
//    $user->register();
//}
//
//if($action == 'login')
//{
//    $user-> login();
//
//}
//
//if($action == 'modifier')
//{
//    $user->changePassword();
//}
//
//if($action == 'new_discussion')
//{
//    $disc->createDiscussion();
//}
//
//if($action == 'envoyer')
//{
//    $user->forgotPwd();
//}