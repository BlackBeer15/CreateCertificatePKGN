<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/origin.css" />
    <link rel="stylesheet" href="styles/login.css" />
    <script src="../js/jquery/jquery-3.7.1.min.js"></script>
    <title>Авторизация</title>
</head>
<body>
    <img src="images/logo.png" alt="logo" />
    <form>
        <div>
            <p>Логин</p><input type="text" name="login" placeholder="Введите логин" />
        </div>
        <div>
            <p>Пароль</p><input type="password" name="password" placeholder="Введите пароль" />
        </div>
        <input type="submit" value="ВОЙТИ" class="logbtn" name="logbtn" />
        <p class="error-form"></p>
    </form>
</body>
<script src="js/ajax/log.js"></script>
</html>