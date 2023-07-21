<?php

namespace Guedes\Agenda;

use PDO;
use Exception;

class MysqlConnection
{
    public static function make()
    {
        $host = "mysql";
        $user = "root";
        $password = "root";
        $dbname = "agenda_2";

        $connection = null;
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            return $connection;
        }
    }
}