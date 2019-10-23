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

    public function get($attribut,$pseudo)
    {
        $query = $this->loadDb()->prepare('SELECT  '. $attribut . ' FROM USER WHERE pseudo= :pseudo AND password= :password');
        $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $query->bindValue(':password',$_SESSION['password']);
        foreach ($query->execute() as $row)
        {
            $result=$row[$attribut];
        }

        return $result;
    }


}