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


    public function getDiscId($title)
    {
        return $this->getDisc('disc_id',$title);
    }

    public function getTitle($id)
    {
        return $this->getDisc('title',$id);
    }


    public function getState($pseudo)
    {
        return $this->get('state',$pseudo);
    }


    public function setDiscId($disc_id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.disc_id :=\'' .$disc_id.'\'');
        $this->execRequete($query);
    }


    public function setState($state)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.state :=\''.$state.'\'');
        $this->execRequete($query);
    }






    public function createDiscussion()
    {
        $this ->state='open';
        $discName = $_POST['nomDisc'];
        $id=$_SESSION['userId'];

        $query = ('INSERT INTO DISCUSSION (state, title)
        VALUES (
         \'' . $this->state . '\',
         \'' . $discName . '\'
         )');

        $this->execRequete($query);
        $query= ('SELECT MAX(disc_id) FROM DISCUSSION');
        $exec=$this->execRequete($query);
        $result=$exec->fetchColumn();
        return $result;
    }

     public function showDisc()
     {

         $oui = $this->loadDb();
         $query = $oui->query('SELECT title,DISCUSSION.state,content,pseudo,message_date FROM DISCUSSION,USER,MESSAGE  
                                        WHERE MESSAGE.disc_id=DISCUSSION.disc_id
                                        AND  MESSAGE.user_id = USER.user_id
                                        ORDER BY DISCUSSION.disc_id DESC;');
         while($row = $query->fetch())
         {
             ?>
             <tr>
                 <td><?php echo $row['title']  ?></td>
                 <td><?php echo $row['state'] ?></td>
                 <td><?php echo $row['content']  ?></td>
                 <td><?php echo $row['pseudo'] ?></td>
                 <td><?php echo $row['message_date']  ?></td>
             </tr>
             <?php
         }

     }






 //   public function showDiscussion

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

