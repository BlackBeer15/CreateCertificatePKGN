<?php
    require_once('connectdb.php');

    date_default_timezone_set("Asia/Krasnoyarsk");

    //Токен бота
    $token = "7644272047:AAElGkQ8JaNmC9GIs9ym19gfZT4df0Mih0E";

    //id чата
    $chat_id = "-1002373891737";

    $student = $_POST['student'];

    if (empty($student['name']) || empty($student['surname']) || empty($student['lastname'])) {
        $response = [
            "status" => false,
            "message" => 'Поля "Имя", "Фамилия", "Отчество" должны быть заполнены!'
        ];
        echo json_encode($response);
    } elseif ($student['typeCert'] != 'О стипендии') {
        $addTicket = $conn->prepare("INSERT INTO `ticket` (`name`, `surname`, `lastname`, `idgroup`, `idTypeCert`) values (:nameS, :surname, :lastname, :idgroup, :idTypeCert)");
		$addTicket->bindParam(':nameS', $student['name']);
        $addTicket->bindParam(':surname', $student['surname']);
        $addTicket->bindParam(':lastname', $student['lastname']);
        $addTicket->bindParam(':idgroup', $student['group']);
        $addTicket->bindParam(':idTypeCert', $student['typeCert']);
        $addTicket->execute();

        $idTicket = $conn->prepare("SELECT MAX(`idTicket`) FROM `ticket`");
        $idTicket->execute();
        $idTicket=$idTicket->fetchAll();

        $response = [
            "header" => 'Готово! 🥳',
            "message" => 'Запомните или сфотографируйте номер вашей заявки чтобы отслеживать готовность справки',
            "idTicket" => $idTicket[0][0],
            "btnText" => 'Готово'
        ];

        $messageTg = "\xE2\x9D\x97 <b>ЗАКАЗ СПРАВКИ №".$idTicket[0][0]." ОТ ".date("d-m-y H:i:s")." </b>\xE2\x9D\x97 \n----------------------------------------------------------------------------\n<b>ФИО студента: </b><u>".$student['surname']." ".$student['name']." ".$student['lastname']."</u>\n<b>Тип справки: </b><u>".$student['typeCert']."</u>\n----------------------------------------------------------------------------\n За подробной информацией и дальнейшей работой перейдите по ссылке: http://10.10.100.207/admin/";
        $messageTg = urlencode($messageTg);

        $sendToTelegram = fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".$messageTg."","r");

        echo json_encode($response);
    } elseif ($student['typeCert'] == 'О стипендии' && empty($student['dateRateStart']) || empty($student['dateRateEnd'])) {
        $response = [
            "status" => false,
            "message" => 'Для заказа справки "О стипендии" необходимо указать желаемый промежуток времени!'
        ];
        echo json_encode($response);
    } elseif ($student['typeCert'] == 'О стипендии' && !empty($student['dateRateStart']) && !empty($student['dateRateEnd'])) {
        $addTicket = $conn->prepare("INSERT INTO `ticket` (`name`, `surname`, `lastname`, `idgroup`, `startDateRate`, `endDateRate`, `idTypeCert`) values (:nameS, :surname, :lastname, :idgroup, :startDateRate, :endDateRate,:idTypeCert)");
		$addTicket->bindParam(':nameS', $student['name']);
        $addTicket->bindParam(':surname', $student['surname']);
        $addTicket->bindParam(':lastname', $student['lastname']);
        $addTicket->bindParam(':idgroup', $student['group']);
        $addTicket->bindParam(':startDateRate', $student['dateRateStart']);
        $addTicket->bindParam(':endDateRate', $student['dateRateEnd']);
        $addTicket->bindParam(':idTypeCert', $student['typeCert']);
        $addTicket->execute();

        $idTicket = $conn->prepare("SELECT MAX(`idTicket`) FROM `ticket`");
        $idTicket->execute();
        $idTicket=$idTicket->fetchAll();

        $response = [
            "header" => 'Готово! 🥳',
            "message" => 'Запомните или сфотографируйте номер вашей заявки чтобы отслеживать готовность справки',
            "idTicket" => $idTicket[0][0],
            "btnText" => 'Готово'
        ];

        $messageTg = "\xE2\x9D\x97 <b>ЗАКАЗ СПРАВКИ №".$idTicket[0][0]." ОТ ".date("d-m-y H:i:s")." </b>\xE2\x9D\x97 \n----------------------------------------------------------------------------\n<b>ФИО студента: </b><u>".$student['surname']." ".$student['name']." ".$student['lastname']."</u>\n<b>Тип справки: </b><u>".$student['typeCert']."</u>\n----------------------------------------------------------------------------\n За подробной информацией и дальнейшей работой перейдите по ссылке: http://10.10.100.207/admin/";
        $messageTg = urlencode($messageTg);

        $sendToTelegram = fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".$messageTg."","r");

        echo json_encode($response);
    }
?>