<?php

//require_once 'MODELS/models_discussion.php';
//require_once 'VIEWS/view_template.php';

class controller_discussion extends controller_main
{

    private $discussion;

    public function __construct() {
        $this->discussion = new discussion();
    }

    public function createDiscussion()
    {
        $this->discussion->createDiscussion();
    }
}