﻿<?php

// const $user = 'bushenev';
// const $password = 'neto1393';

try {
$dbh = new PDO('mysql:host=localhost;dbname=global;charset=utf8', 'bushenev', 'neto1393');
} catch (PDOException $e) {
	echo 'Ошибка подключения к БД: ' .$e->getMessage();
	die;
}
?>