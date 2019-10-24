<?php

require_once 'models_base.php';

class message extends base
{
    private $message_id;
    private $content;
    private $message_date;
    private $user_id;
    private $state;

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
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
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
        $query = ('UPDATE MESSAGE SET MESSAGE.state =\''.$state.'\'');
        $this->execquery($query);;
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

    public function showMsg($discId)
    {
        $oui = $this->loadDb();
        $query = $oui->query('SELECT pseudo,content,message_date FROM MESSAGE,USER
                                        WHERE MESSAGE.user_id=USER.user_id ORDER BY message_id DESC');


        while ($row = $query->fetch()) {
            ?>
            <td><?php echo $row['content'] ?></td>
            <td><?php echo $row['pseudo'] ?></td>
            <td> <?php echo $row['message_date'] ?> </td>
            </tr>
            <?php

        }
    }


//    public function CloseMessage($content, $message_id)
//    {
//    if ($content > 2)
//    {
//      close($message_id);
//    }
//    }ù
}