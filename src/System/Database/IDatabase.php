<?php

namespace App\System\Database;

interface IDatabase
{
    public function connect($host, $dbname, $user, $password);
}