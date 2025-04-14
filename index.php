<?php
    require_once('php/connectdb.php');
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
    <link rel="stylesheet" href="styles/form.css" />
    <link rel="stylesheet" href="styles/message.css" />
    <link rel="stylesheet" href="styles/status.css" />
    <link rel="stylesheet" href="styles/media/mediaMain.css" />
    <script src="js/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
    <!-- KeyBoard -->
    <script src="js/KioskBoard/dist/kioskboard-aio-2.3.0.min.js"></script>
    <title>Заказ справки</title>
</head>
<body>
    <div class="message-wrapper">
        <div class="message-content">
            <p class="message-header"></p>
            <p class="message-text"></p>
            <p class="id-ticket"></p>
            <button id="closeMessage"></button>
        </div>
    </div>
    <div class="status-wrapper">
        <div class="status-content">
            <div class="cert-info">
                <p class="header-cert-info"></p>
                <p class="create-date"></p>
                <div class="fio-cert-info">
                    <p id="surname"></p>
                    <p id="name"></p>
                    <p id="lastname"></p>
                </div>
                <p class="typeCert"></p>
                <p class="group"></p>
            </div>
            <div class="status-map">
                <div>
                   <p>😉</p>
                   <p>Принято</p>
                </div>
                <div>
                    <div class="arrow-1">
                        <div></div>
                    </div>
                </div>
                <div class="ready-status">
                   <p>🥳</p>
                   <p>Готово</p>
                   <input id="ready" type="text" hidden>
                </div>
            </div>
            <p class="message-status">Вы можете забрать свою справку в 212 кабинете (ТОЛЬКО НА ПЕРЕМЕНЕ!)</p>
            <button id="closeStatus">Ок</button>
        </div>
    </div>
    <canvas class="bg-wrapper"></canvas>
    <header>
        <a href="index.php">
            <img src="images/logo.png" alt="Logo" />
            <p>
                Профессиональный колледж г. Новокузнецка<br> имени Кучерявенко Тамары Александровны
            </p>
        </a>
        <h1>
            Cправки
        </h1>
    </header>
    <main id="app">
        <div class="button-wrapper">
            <a href="#orderCert" id="orderCert">Заказать справку</a>
            <a href="#checkStatus">Проверить статус справки</a>
        </div>
    </main>
</body>
<script src="js/spa/router.js"></script>
<script src="js/spa/route.js"></script>
<script src="js/spa/app.js"></script>
<script src="js/particles.js"></script>
<script src="js/select.js"></script>
<script src="js/message.js"></script>
<script src="js/status.js"></script>
<script src="js/ajax/orderCert.js"></script>
<script src="js/ajax/checkStatus.js"></script>
<script src="js/KioskBoard/init.js"></script>
<script>
    let observer = new MutationObserver(mutationRecords => {
        initBoard();
    })

    observer.observe(app, {
        childList: true, // наблюдать за непосредственными детьми
        subtree: true, // и более глубокими потомками
        characterDataOldValue: true // передавать старое значение в колбэк
    });
</script>
</html>