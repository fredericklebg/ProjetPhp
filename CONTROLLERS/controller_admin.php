<?php

require_once 'MODELS/models_user.php';
require_once 'VIEWS/view_template.php';

class controller_admin extends controller_main
{
    private $user;

    public function __construct()
    {
        $this->user = new user();

    }

    public function index()
    {
        $vue = new Vue('admin');
        $vue->generer(array());

    }

    public function changeNbDisc()
    {
        $this->user->setMaxDisc($_POST['d1']);
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'le nombre de discussions ouvertes'));

    }
    public function Supprimer () {
        $this->user->deleteUser();
}
}    
    