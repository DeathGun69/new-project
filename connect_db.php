<?php

// Объявляем переменные, в которых будут храниться параметры для подключения к СУБД
$db_host = '127.0.0.1';		// Сервер
$db_user = 'root';	// Имя пользователя
$db_password = 'root';	// Пароль пользователя
$db_name = 'subject_db';			// Имя базы данных

// Подключение к базе данных
 $connect = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Проверка соединения
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}