<?php

// Получаем путь без параметров
$host = explode('?', $_SERVER['REQUEST_URI'])[0];

// Убираем первый и последний слеш, затем делим на части
$parts = explode('/', trim($host, '/'));

// Если сайт находится в подпапке (например /newsportal),
// то $parts[0] = 'newsportal', а реальный путь начинается с $parts[1]
if ($parts[0] === 'newsPortalPikolad') {
    $path = $parts[1] ?? '';
} else {
    $path = $parts[0] ?? '';
}

// Маршрутизация
if ($path === '' || $path === 'index' || $path === 'index.php') {
    $response = Controller::StartSite();
}

elseif ($path === 'all') {
    $response = Controller::AllNews();
}

elseif ($path === 'category' && isset($_GET['id'])) {
    $response = Controller::NewsByCatID($_GET['id']);
}

elseif ($path === 'news' && isset($_GET['id'])) {
    $response = Controller::NewsByID($_GET['id']);
}

else {
    $response = Controller::error404();
}

?>
