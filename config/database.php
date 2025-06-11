<?php

class Database
{

    private $host = "babar.db.elephantsql.com";
    private $database_name = "hanzqbih";
    private $user = "hanzqbih";
    private $password = "pziEHtqhddYs10AbuGEErbLRmdNGJBLw";

    public $con;

    public function getConection()
    {
        $this->con = null;

        try {
            $this->con = new PDO("pgsql:host=" . $this->host . ";port=5432;dbname=" . $this->database_name, $this->user, $this->password);

        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }

        return $this->con;
    }
}
