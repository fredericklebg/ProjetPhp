<?php

require_once 'MODELS/models_discussion.php';
require_once  'MODELS/models_message.php';
require_once 'VIEWS/view_template.php';

class controller_discussion extends controller_main
{

    private $discussion;
    private $msg;

    public function __construct() {
        $this->discussion = new discussion();
        $this->msg = new message();

    }

    public function index()
    {
        $vue = new Vue('discussion');
        $vue->generer(array());

    }

    public function createDiscussion()
    {
        if(strlen($_POST['msg'])== 0)
        {
            throw new Exception('le message est vide');
        }
        if(strlen($_POST['nomDisc'])== 0)
        {
            throw new Exception('le titre de la discussion est vide');
        }
        $id=$this->discussion->createDiscussion();
        //ajouter message avec addMessage
        $this->msg->addMessage($id);
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp");

    }

    public function delMsg()
    {
        $this->msg->delMsg($_GET['id']);
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp/");

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

    public function Envoyer()
    {
        if(strlen($_POST['msg'])== 0)
        {
            throw new Exception('le message est vide');
        }

            if($this->msg->traiterMsg() == -1) //si le message est fermé, on est créé un nouveau dans la discussion
                $this->msg->addMessage($_GET['id']);

        $vue= new Vue('discussion');
        $vue->generer(array());
    }
    public function Fermer()
    {
        if(strlen($_POST['msg'])== 0)
        {
            throw new Exception('le message est vide');
        }

        $this->msg->traiterMsg();
        $this->msg->setState('fermé'); //ferme le message courant

        $vue= new Vue('discussion');
        $vue->generer(array());
    }

//
}