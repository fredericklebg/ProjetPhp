<?php

class base
{


    public function loadDb()
    {
        return $db = new PDO('mysql:host=mysql-tpphp.alwaysdata.net;dbname=tpphp_bd', 'tpphp', 'ericzemour');
    }

    public function execRequete($query)
    {
        return $this->loadDb()->query($query);
    }


    public function get($attribut,$pseudo,$pass)
    {
        $query = $this->loadDb()->prepare('SELECT '.$attribut.' FROM USER WHERE pseudo= :pseudo AND password= :password');
        $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $query->bindValue(':password',$pass,PDO::PARAM_STR);
        $query->execute();
        foreach ( $query as $row)
        {
            $result=$row[$attribut];
        }

        return $result;
    }

   public function getDisc($attribut,$id)
   {
       $query = ('SELECT ' . $attribut . ' FROM DISCUSSION WHERE disc_id =\' '.$id .'\'');
       foreach ($this->execRequete($query) as $row)
       {
           $result=$row[$attribut];
       }

       return $result;
   }

   public function getUser($attribut,$id)
   {
       $query = ('SELECT ' . $attribut . ' FROM USER WHERE user_id =\' '.$id .'\'');
       foreach ($this->execRequete($query) as $row)
       {
           $result=$row[$attribut];
       }

       return $result;
   }


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
        $query = $this->execRequete($query);
        var_dump($query);
        exit();
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