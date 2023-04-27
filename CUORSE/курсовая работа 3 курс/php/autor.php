<?php
$login = $_POST['login'];
$password = $_POST['password'];

$mysql = new mysqli('localhost', 'root', '', 'English_School');
$mysql->set_charset('utf8');
if($mysql->connect_error){
    die("Ошибка: " . $mysql->connect_error);
}

// обратное хеширование для проверки пароля
$newPass = password_verify($password, $hash);

$query ="SELECT * FROM `Student` WHERE `Log_In` = '$login' AND `Password` = '$newPass'";
if(count($query) == 0) {
    echo "Такого пользователя нет";
    exit();
}


header('Location: ./profile.php');
$mysql->close();
?>