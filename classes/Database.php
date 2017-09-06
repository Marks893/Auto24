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

        try {
            $this->pdo = new PDO('mysql:dbname=' . $db . ';host=127.0.0.1', $user, $pass);
        } catch (PDOException $e) {
            echo 'Failed to connect to database';
        }
    }

    public static function instance()
    {
        if (self::$db === null)
            self::$db = new self();

        return self::$db;
    }

    public function query($sql, $params)
    {
        $statement = $this->pdo->prepare(sql);
        $statement->execute();
        return $statement;
    }
}