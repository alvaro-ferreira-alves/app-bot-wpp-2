<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/Schedules.php';

    $database = new Database();
    $db = $database->getConection();

    $items = new Schedules($db);

    $stmt = $items->getSchedules();
    $itemCount = $stmt->rowCount();


    //echo json_encode($itemCount);

    if($itemCount > 0){
        
        $schedulesArr = array();
        $schedulesArr["data"] = array();
        $schedulesArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $schedule = array(
                "id" => $row['id'],
                "pdv" => $row['pdv'],
                "nome_fantasia" => $row['nome_fantasia'],
                "contatos" => $row['contatos'],
                "created" => $row['created']
            );

            array_push($schedulesArr["data"], $schedule);
        }
        echo json_encode($schedulesArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
