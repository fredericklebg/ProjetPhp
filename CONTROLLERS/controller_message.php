<?php

require_once 'MODELS/models_message.php';
require_once 'VIEWS/view_template.php';

class controller_message extends controller_main
{
    private $message;

    public function __construct()
    {
        $this->message = new message();

    }



    }