<?php

require_once 'models_base.php';

class message extends base
{
    private $disc_id;
    private $message_id;
    private $content;
    private $message_date;
    private $user_id;
    private $state;

    public function __construct()
    {

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

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        $query2='SELECT state FROM MESSAGE WHERE message_id IN(SELECT MAX(message_id) FROM MESSAGE WHERE disc_id= :disc_id)';
        $query2 = $this->loadDb()->prepare($query2);
        $query2->bindValue('disc_id' , $_GET['id'] , PDO::PARAM_INT);
        $query2->execute();
        $state = $query2->fetchColumn();
        return $state;
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

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $query = ('UPDATE MESSAGE SET MESSAGE.state =\''.$state.'\' WHERE message_id= \'' .$this->message_id . '\' ' );
        $this->execRequete($query);
    }

    public function addMessage($discId)
    {
        if( $this->verifMsg()) {
        $msg=$_POST['msg'];
        $userId=$_SESSION['userId'];
        $query = 'INSERT INTO MESSAGE(disc_id,content,user_id,state,message_date)
        VALUES (
         \'' . $discId. '\' ,
         \'' . $msg. '\',
         \'' . $userId . '\' ,
          \'' . 'ouvert' . '\' ,
                NOW()   
         )';
        $this->execRequete($query);
        $this->message_id=$this->execRequete('SELECT MAX(message_id) FROM MESSAGE');
        }
    }
    public function verifMsg () {
        if(preg_match('\^[ ]*[a-zA-Z0-9.-_]+[ ]*[a-zA-Z0-9.-_]+[ ]*/$',$_POST['msg'])) return true;
    }

    public function showMsg($discId)
    {
        $query=('SELECT * FROM MESSAGE WHERE disc_id = :discId ');
        $query = $this->loadDb()->prepare($query);
        $query->bindValue('discId',$discId,PDO::PARAM_INT);
        $query->execute();
        return $query;
    }


    public function traiterMsg()
    {

        $content=$_POST['msg'];
        $content = ' ' . $content;

        $query2='SELECT state FROM MESSAGE WHERE message_id IN(SELECT MAX(message_id) FROM MESSAGE WHERE disc_id= :disc_id)';
        $query2 = $this->loadDb()->prepare($query2);
        $query2->bindValue('disc_id' , $_GET['id'] , PDO::PARAM_INT);
        $query2->execute();
        $state = $query2->fetchColumn();

        if($state=='fermé')
            return -1;

        $query1='SELECT MAX(message_id) FROM MESSAGE WHERE disc_id=:disc_id AND state=:state';
        $query1 = $this->loadDb()->prepare($query1);
        $query1->bindValue('disc_id',$_GET['id'],PDO::PARAM_INT);
        $query1->bindValue('state','ouvert',PDO::PARAM_STR);
        $query1->execute();
        $msg_id = $query1->fetchColumn();
        $this->message_id=$msg_id;

        $query = 'UPDATE MESSAGE SET content = concat(content,:message) where message_id=:message_id';
        $query = $this->loadDb()->prepare($query);
        $query ->bindValue('message',$content,PDO::PARAM_STR);
        $query->bindValue('message_id',$msg_id,PDO::PARAM_INT);
        $query->execute();


    }



//    public function CloseMessage($content, $message_id)
//    {
//    if ($content > 2)
//    {
//      close($message_id);
//    }
//    }ù
}