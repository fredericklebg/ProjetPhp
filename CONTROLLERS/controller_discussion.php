<?php

//require_once 'MODELS/models_discussion.php';
//require_once  'MODELS/models_message.php';
//require_once 'VIEWS/view_template.php';

class controller_discussion extends controller_main
{

    private $discussion;
    private $msg;

    public function __construct() {
        $this->discussion = new discussion();
        $this->msg = new message();

    }

    public function createDiscussion()
    {
        $id=$this->discussion->createDiscussion();
        //ajouter message avec addMessage
        $this->msg->addMessage($id);
        $vue = new Vue('affichdisc');
        $vue->generer(array());

    }

    public function newDiscussion()
    {
        if ($_SESSION['isLogin']=='ok')
        {
            $vue = new Vue('newDiscussion');
            $vue->generer(array());
        }
        else throw new Exception('vous devez etre connecté pour créer une discussion');
    }


}