<?php
    require_once('connectdb.php');

    $idTicket = $_POST['idTicket'];

    if (empty($idTicket)) {
        $response = [
            "status" => false,
            "message" => 'Не указан номер заявки'
        ];
        echo json_encode($response);
    } else {
        $statusTicket = $conn->prepare("SELECT * FROM `ticket` WHERE `idTicket`=".$idTicket."");
        $statusTicket->execute();
        $statusTicket=$statusTicket->fetchAll();

        if (!empty($statusTicket)) {
            $response = [
                "valid" => true,
                "idTicket" => $statusTicket[0]['idTicket'],
                "name" => $statusTicket[0]['name'],
                "surname" => $statusTicket[0]['surname'],
                "lastname" => $statusTicket[0]['lastname'],
                "createDate" => $statusTicket[0]['dateTicket'],
                "group" => $statusTicket[0]['idgroup'],
                "typeCert" => $statusTicket[0]['idTypeCert'],
                "status" => $statusTicket[0]['status'],
            ];
            echo json_encode($response);
        } else {
            $response = [
                "valid" => false,
                "header" => 'Упс 😬',
                "message" => 'Такой заявки нет!',
                "btnText" => 'Понятно'
            ];
            echo json_encode($response);
        }
    }
?>