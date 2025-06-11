<?php
$dados = json_decode(file_get_contents('pdv.json'));
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$pdv = $_GET['pdv'];

foreach ($dados as $dado) {
    if ($dado->pdv == $pdv) {
        echo json_encode($dado);
    }
}
