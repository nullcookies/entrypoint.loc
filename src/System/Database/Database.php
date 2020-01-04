<?php

namespace App\System\Database;

class Database implements IDatabase
{
    public function connect($host, $dbname, $user, $password)
    {
        $link = null;
        try
        {
        $link = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=UTF8", $user, $password);
        }
        catch (PDOException $e) 
        {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        return $link;
    }

}