<?php
    session_start();

    require_once('connect.php');

    $idTicket = $_POST['idTicket'];
    $status = $_POST['value'];

    try {
        $updateUser = $conn->prepare("UPDATE `ticket` SET `userUpdate` = ".$_SESSION['user']['id']." WHERE (`idTicket` = '$idTicket')");
        $updateUser->execute();

        $updateStat = $conn->prepare("UPDATE `ticket` SET `status` = '$status' WHERE (`idTicket` = '$idTicket')");
        $updateStat->execute();

        $response = [
            "status" => true
        ];
        echo json_encode($response);

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
?>