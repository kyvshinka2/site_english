<?php
session_start();

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

// проверка на пустые поля 
if(empty($login) || empty($password)) {
    echo "Не оставляйте пустые поля!";
    exit();
}

// подключение к бд
$mysql = new mysqli('localhost', 'root', '', 'English_School');
$mysql->set_charset('utf8');
if($mysql->connect_error){
    die("Ошибка: " . $mysql->connect_error);
}

// обратное хеширование для проверки пароля
$newPass = password_verify($password, $hash);

$query ="SELECT * FROM `Student` WHERE `Log_In` = '$login' AND `Password` = '$newPass'";





$mysql->close();

header('Location: ./profile.php');
?>