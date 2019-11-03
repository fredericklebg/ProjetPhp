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

    public function changePassView()
    {
        $vue = new Vue('changePass');
        $vue->generer(array());
    }

}











