<?php 
    require_once('php/connect.php');

    session_start();

    $verifUs = $conn->query('SELECT `login` FROM `user` WHERE `login` = "'.$_SESSION['user']['login'].'"');
    $rows = $verifUs->fetchAll();

	if (!$_SESSION['user'] || $rows[0]['login']==NULL) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/origin.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/main.css" />
    <script src="../js/jquery/jquery-3.7.1.min.js"></script>
    <title>Заказанные справки</title>
</head>
<body>
    <header>
        <div>
            <p>Профиль: <span><?=$_SESSION['user']['name']?></span></p>
            <a href="php/logout.php">Выйти</a>
        </div>
    </header>
    <main>
        <h1>Заказанные справки</h1>
        <table>
            <thead>
                <tr>
                    <td rowspan="2">№</td>
                    <td rowspan="2">Когда создана</td>
                    <td rowspan="2">ФИО</td>
                    <td rowspan="2">Группа</td>
                    <td rowspan="2">Вид справки</td>
                    <td colspan="2">Если справка о стипендии</td>
                    <td rowspan="2">Статус</td>
                </tr>
                <tr>
                    <td>От</td>
                    <td>До</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $allOrders = $conn->query('SELECT * FROM `ticket` ORDER BY `dateTicket` DESC');
                    foreach ($allOrders as $row) {
                        echo '
                            <tr>
                                <td>'.$row['idTicket'].'</td>
                                <td>'.$row['dateTicket'].'</td>
                                <td>'.$row['surname'].' '.$row['name'].' '.$row['lastname'].'</td>
                                <td>'.$row['idgroup'].'</td>
                                <td>'.$row['idTypeCert'].'</td>
                                <td>'.$row['startDateRate'].'</td>
                                <td>'.$row['endDateRate'].'</td>
                                <td class="status">'.$row['status'].'</td>
                                <td class="for-btn"><button class="btn" value="'.$row['idTicket'].'">';
                                    if ($row['status']=='Принято') {
                                        echo 'Готово';
                                    } else {
                                        echo 'Принято';
                                    }    
                                echo '</button></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
<script src="js/btn.js"></script>
<script src="js/ajax/updateStatus.js"></script>
</html>