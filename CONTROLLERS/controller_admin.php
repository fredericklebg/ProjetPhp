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
        $this->user->setMaxDisc(htmlspecialchars($_POST['d1']));
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'le nombre de discussions ouvertes'));
    }

    public function changeNbMsg()
    {
        $this->user->setMaxMsg(htmlspecialchars($_POST['d2']));
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'le nombre de messages maximum par discussion'));
    }

    public function changePagination()
    {
        $this->user->setPagination(htmlspecialchars($_POST['d5']));
        $vue = new Vue('paramUpdated');
        $vue->generer(array('param' => 'la pagination'));
    }
    public function Supprimer()
    {
        $userSupp=$_POST['aurevoir'];

        if ($this->user->isAdmin($userSupp)) {
            throw new Exception('Admin impossible à supprimer');
        }
        if (empty($userSupp) )
        {
            throw new Exception('Pseudo vide');
        }
        $this->user->deleteUser();
        $vue = new Vue('userDeleted');
        $vue->generer(array('param'=> $userSupp));
    }
}
