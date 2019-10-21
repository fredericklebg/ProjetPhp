<?php

require_once 'models_base.php';
class discussion extends base
{
    private $disc_id;
    private $user_id;
    private $message_id;
    private $state;

    public function __construct()
    {

    }


    public function getDiscId($pseudo)
    {
        return $this->get('disc_id',$pseudo);
    }

    public function getUserId($pseudo)
    {
        return $this->get('user_id',$pseudo);
    }

    public function getMessageId($pseudo)
    {
        return $this->get('$this->message_id',$pseudo);
    }

    public function getState($pseudo)
    {
        return $this->get('state',$pseudo);
    }

    /**
     * @param mixed $disc_id
     */
    public function setDiscId($disc_id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.disc_id :=\'' .$disc_id.'\'');
        $this->execRequete($query);
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.state :=\''.$state.'\'');
        $this->execRequete($query);
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.user_id :=\''.$user_id.'\'');
        $this->execRequete($query);
    }

    /**
     * @param mixed $message_id
     */
    public function setMessageId($message_id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.message_id :=\''.$message_id.'\'');
        $this->execRequete($query);
    }


    public function createDiscussion()
    {
        $this ->state='open';
        $discName = $_POST['nomDisc'];
        $id=$_SESSION['userId'];

        $query = ('INSERT INTO DISCUSSION (user_id, state, title)
        VALUES (
         \'' . $id . '\',
         \'' . $this->state . '\',
         \'' . $discName . '\'
         )');

        var_dump($query);
        exit();
        $this->execRequete($query);
        $query= ('SELECT LAST_INSERT_ID() FROM DISCUSSION');
        $a=$this->execRequete($query);
        $result=$a->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

//    public function closeDiscussion()
//    {
//        $this ->state='close';
//
//        $query = 'UPDATE INTO DISCUSSION (state)
//        VALUES (
// *        \'' . $this->state . '\'
//         )';
//    }


////    public function addMessageIntoDisc()
//    {
//        get($state,disc_id);
//        if ($state = 'close')
//            ERROR404;
//        else

//    }
}




?>

