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
        $vue->generer(array('msg' => 'votre inscriprion a bien été enregistrée !' ,
            'accueil' => 'echo \' <br/>  <a href=../VIEWS/view_accueil.php> Retourner a l\'accueil </a > \';'));
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
    public function disconnect()
    {
        $this->user->disconnect();
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