<?php

class Database
{
    private static $db = null;
    private $pdo;

    public function __construct()
    {
        $conf = App::resolve('config.db');
        $db = $conf['name'];
        $user = $conf['user'];
        $pass = $conf['password'];
        $host = $conf['host'];

        try {
            $this->pdo = new PDO('mysql:dbname=' . $db . ';host=' . $host, $user, $pass);
        } catch (PDOException $e) {
            exit('Failed to connect to DB');
        }
    }

    public static function instance()
    {
        if (self::$db === null)
            self::$db = new Database();

        return self::$db;
    }

    public function query($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function lastId()
    {
        return $this->pdo->lastInsertId();
    }
}