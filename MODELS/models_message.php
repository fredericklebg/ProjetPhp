<?php

require_once 'models_base.php';

class message extends base
{
    private $message_id;
    private $content;
    private $message_date;
    private $user_id;

    public function __construct()
    {
//        $query =('SELECT * FROM MESSAGE');
//        $this->execquery($query);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /***
     * @return mixed
     */
    public function getMessageDate()
    {
        return $this->message_date;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $query = ('UPDATE MESSAGE SET MESSAGE.content =\''.$content.'\'');
        $this->execquery($query);
    }

    /**
     * @param mixed $message_date
     */
    public function setMessageDate($message_date)
    {
        $query = ('UPDATE MESSAGE SET MESSAGE.message_date =\''.$message_date.'\'');
        $this->execquery($query);
    }

    /**
     * @param mixed $message_id
     */
    public function setMessageId($message_id)
    {
        $query = ('UPDATE MESSAGE SET MESSAGE.message_id =\''.$message_id.'\'');
        $this->execquery($query);
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $query = ('UPDATE MESSAGE SET MESSAGE.user_id =\''.$user_id.'\'');
        $this->execquery($query);
    }


    public function addMessage($discId)
    {
        $msg=$_POST['newMsg'];
        $userId=$_SESSION['userId'];
        $query = 'INSERT INTO MESSAGE(disc_id,content,user_id,message_date)
        VALUES (
         \'' . $discId. '\' ,
         \'' . $msg. '\',
         \'' . $userId . '\' ,
                NOW()   
         )';
        $this->execRequete($query);

    }



//    public function CloseMessage($content, $message_id)
//    {
//    if ($content > 2)
//    {
//      close($message_id);
//    }
//    }ù
}











?>