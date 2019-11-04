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
        return $this->getDisc('disc_id', $title);
    }

    public function getTitle($id)
    {
        return $this->getDisc('title', $id);
    }


    public function getState($id)
    {
        $query = 'SELECT state FROM DISCUSSION where disc_id=:id';
        $query = $this->loadDb()->prepare($query);
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchColumn();

    }


    public function setDiscId($disc_id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.disc_id :=\'' . $disc_id . '\'');
        $this->execRequete($query);
    }


    public function setState($state, $id)
    {
        $query = ('UPDATE DISCUSSION SET DISCUSSION.state :=\'' . $state . '\' WHERE disc_id=\'' . $id . '\' ');
        $this->execRequete($query);
    }


    public function createDiscussion()
    {
        $this->state = 'ouverte';
        $discName = htmlspecialchars($_POST['nomDisc']);

        $query = ('INSERT INTO DISCUSSION (state, title)
        VALUES (
         \'' . $this->state . '\',
         \'' . $discName . '\'
         )');

        $this->execRequete($query);
        $query = ('SELECT MAX(disc_id) FROM DISCUSSION');
        $exec = $this->execRequete($query);
        $result = $exec->fetchColumn();
        return $result;
    }


    public function countDisc()
    {
        $query = 'SELECT count(*) FROM DISCUSSION where state=:state';
        $query = $this->loadDb()->prepare($query);
        $query->bindValue('state', 'ouverte', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchColumn();
    }

    public function showDisc($debut, $limit)
    {

        $oui = $this->loadDb();
        $query = ('SELECT SQL_CALC_FOUND_ROWS title,DISCUSSION.state,content,pseudo,message_date,DISCUSSION.disc_id FROM DISCUSSION,USER,MESSAGE  
                                        WHERE MESSAGE.disc_id=DISCUSSION.disc_id
                                        AND  MESSAGE.user_id = USER.user_id
                                        AND message_id in (SELECT MAX(message_id) from MESSAGE where MESSAGE.disc_id = DISCUSSION.disc_id)
                                        ORDER BY length(DISCUSSION.state) , MESSAGE.message_id DESC LIMIT :limit OFFSET :debut');
        $query = $oui->prepare($query);
        $query->bindValue('limit', $limit, PDO::PARAM_INT);
        $query->bindValue('debut', $debut, PDO::PARAM_INT);
        $query->execute();
        $total = $oui->query('SELECT found_rows()')->fetchColumn();
        return array($query, $total);

    }

    public function delDisc($id)
    {
        $query = 'DELETE FROM MESSAGE WHERE disc_id=:id';
        $query = $this->loadDb()->prepare($query);
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $query2 = 'DELETE FROM DISCUSSION WHERE disc_id=:id';
        $query2 = $this->loadDb()->prepare($query2);
        $query2->bindValue('id', $id, PDO::PARAM_INT);
        $query2->execute();
    }

}

?>

