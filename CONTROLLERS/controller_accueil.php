<?php

require_once 'MODELS/models_user.php';
require_once 'VIEWS/view_template.php';


class controller_accueil extends controller_main
{
    private $user;

    public function index()
    {
        $vue = new Vue('accueil');
        $vue->generer(array());

    }
    public function __construct() {
        $this->user = new user();
    }
    public function inscription()
    {
        $this ->user ->register();
        $vue = new Vue('inscription');
        $vue->generer(array());
    }
    public function login()
    {
        $this ->user ->login();
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }
    public function changePass()
    {
        $this->user->changePassword();
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }
    public function sendMdp()
    {
        $this->user->sendMdp();
        $vue = new Vue('sendMdp');
        $vue->generer(array());


    }
    public function forgotMdp() {

        $vue = new Vue('forgoMdp');
        $vue->generer(array());
    }

    public function disconnect()
    {
        $this->user->disconnect();
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }
    public function profilePage()
    {
        $vue = new Vue('profilePage');
        $vue->generer(array());
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