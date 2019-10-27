<?php

require_once 'MODELS/models_user.php';
require_once 'VIEWS/view_template.php';

class controller_admin extends controller_main
{
    private $user;

    public function __construct() {
        $this->user = new user();

    }

    public function createadm()
    {
        $vue = new Vue('param');
        $vue->generer(array());

    }
}