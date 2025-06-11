<?php
$dados = json_decode(file_get_contents('status.json'));
header('Content-type: text/javascript');


echo json_encode($dados->status);

