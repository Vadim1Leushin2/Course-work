<?php

//--------------------------Настройки подключения к БД---------------------—
$db_host = 'std-mysql.ist.mospolytech.ru';
$db_user = 'std_1593_kursovaya1'; //имя пользователя совпадает с именем БД
$db_password = 'Vadim1928'; //пароль, указанный при создании БД
$database = 'std_1593_kursovaya1'; //имя БД, которое было указано при создании
$conn = mysqli_connect($db_host, $db_user, $db_password, $database);
if ($conn == false) {
    die("Connection failed: " . mysqli_connect_error());
    echo "error";
}

?>

