<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'class/Schedules.php';

$dados = json_decode(file_get_contents('pdv.json'));
$database = new Database();
$db = $database->getConection();

$item = new Schedules($db);

$pdv = $_GET['pdv'];
$contatos = $_GET['contatos'];
$nome_fantasia = "";

foreach ($dados as $dado) {
    if ($dado->pdv == $pdv) {
        echo json_encode($dado);
        $nome_fantasia = $dado->nome;
    }
}

$item->pdv = $pdv;
$item->nome_fantasia = $nome_fantasia;
$item->contatos = $contatos;
$item->created = date('Y-m-d H:i:s');

if ($item->createSchedules()) {
    echo 'Schedules created successfully.';
} else {
    echo 'Schedules could not be created.';
}
