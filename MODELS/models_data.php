<?php

require_once 'models_base.php';

class data extends base{


    public function setMaxDisc($max)
    {
        $query = 'UPDATE DATA SET max_disc= :max';
        $query=$this->loadDb()->prepare($query);
        $query->bindValue('max',$max , PDO::PARAM_INT);
        $query->execute();
    }


    public function setMaxMsg($max)
    {
        $query = 'UPDATE DATA SET max_msg= :max';
        $query=$this->loadDb()->prepare($query);
        $query->bindValue('max',$max , PDO::PARAM_INT);
        $query->execute();
    }

    public function setPagination($pa)
    {
        $query = 'UPDATE DATA SET pagination= :pa';
        $query=$this->loadDb()->prepare($query);
        $query->bindValue('pa',$pa , PDO::PARAM_INT);
        $query->execute();
    }

    public function getPagination()
    {
        $query = 'SELECT pagination FROM DATA';
        return $this->execRequete($query);
    }

    public function getMaxDisc()
    {
        $query = 'SELECT max_disc FROM DATA';
        return $this->execRequete($query);
    }

    public function getMaxMsg()
    {
        $query = 'SELECT max_msg FROM DATA';
        return $this->execRequete($query);
    }
}

