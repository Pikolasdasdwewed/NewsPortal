<?php
session_start();
include_once 'inc/Database.php';
require 'model/Category.php';
require 'model/News.php';

include_once 'view/news.php';

include_once 'controller/controller.php';
include_once 'route/routing.php';

echo $response;
?>