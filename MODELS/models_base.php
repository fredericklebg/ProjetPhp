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
        $query = ('SELECT ' . $attribut . ' FROM USER WHERE pseudo= \''.$pseudo.'\' AND password=\''.$_SESSION['password'].'\'');
        foreach ($this->execRequete($query) as $row)
        {
            $result=$row[$attribut];
        }

        return $result;
    }


}