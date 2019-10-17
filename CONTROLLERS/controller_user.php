<?php

require_once '../MODELS/models_user.php';
require_once '../VIEWS/view_template.php';

class controller_user
{
    private $user;

    public function __construct() {
        $this->user = new user();
    }
    public function register()
    {
        $this ->user ->register();
    }
    public function login()
    {
        $this ->user ->login();
    }
    public function changePass()
    {
        $this->user->changePassword();
    }
    public function forgotPass()
    {
        $this->user->forgotPwd();
    }
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