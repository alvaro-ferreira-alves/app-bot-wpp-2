<?php

date_default_timezone_set('America/Sao_Paulo');

class Schedules
{

    private $con;

    private $table = "agendamentos";

    public $id;
    public $pdv;
    public $nome_fantasia;
    public $contatos;
    public $created;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function createSchedules()
    {
        $query = "INSERT INTO public." . $this->table . "(pdv, nome_fantasia, contatos, created) VALUES (:pdv, :nome_fantasia, :contatos, :created)";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":pdv", $this->pdv);
        $stmt->bindParam(":nome_fantasia", $this->nome_fantasia);
        $stmt->bindParam(":contatos", $this->contatos);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getSchedules()
    {
        $query = "SELECT * FROM " . $this->table . "";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}



