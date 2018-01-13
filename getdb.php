<?php

// const $user = 'bushenev';
// const $password = 'neto1393';

try {
$dbh = new PDO('mysql:host=localhost;dbname=global;charset=utf8', 'root');
} catch (PDOException $e) {
	echo 'Ошибка подключения к БД: ' .$e->getMessage();
	die;
}
?>