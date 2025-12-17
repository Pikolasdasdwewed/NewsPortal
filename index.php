<?php
session_start();

// Подключаем базу и модели
include_once 'inc/Database.php';
require 'model/Category.php';
require 'model/News.php';
require 'model/Comments.php'; // <-- новая модель
require 'model/Register.php';

// Подключаем views
include_once 'view/news.php';
include_once 'view/comments.php'; // <-- новый view

// Подключаем контроллер и роутинг
include_once 'controller/controller.php';
include_once 'route/routing.php';

// Выводим ответ
echo $response;
?>
