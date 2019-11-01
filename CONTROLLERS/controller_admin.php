<?php

require_once 'MODELS/models_user.php';
require_once 'VIEWS/view_template.php';

class controller_admin extends controller_main
{
    private $user;

    public function __construct() {
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

    public function changeNbMsg()
    {
        $this->user->setMaxMsg($_POST['d2']);
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'le nombre de messages maximum par discussion'));
    }

    public function changePagination()
    {
        $this->user->setPagination($_POST['d5']);
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'la pagination'));
    }
    public function Supprimer()
    {
        if (!empty($_POST['d3']) )
            throw new Exception('Pseudo vide');
        if($_POST['d3']->getState()!='admin')
            throw new Exception('Impossible de supprimer un administrateur');
        $this->user->deleteUser();
    }
}