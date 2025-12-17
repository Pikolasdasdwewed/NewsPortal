<?php
$uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriPath = trim($uriPath, '/');
$parts   = ($uriPath === '') ? [] : explode('/', $uriPath);

// если проект в подпапке /newsportal
if (isset($parts[0]) && $parts[0] === 'newsportal') {
    array_shift($parts);
}

$path = $parts[0] ?? '';

if ($path === '' || $path === 'index' || $path === 'index.php') {
    $response = Controller::StartSite();
}
elseif ($path === 'all') {
    $response = Controller::AllNews();
}
elseif ($path === 'category' && isset($_GET['id'])) {
    $response = Controller::NewsByCatID((int)$_GET['id']);
}
elseif ($path === 'news' && isset($_GET['id'])) {
    $response = Controller::NewsByID((int)$_GET['id']);
}
elseif ($path === 'insertcomment' && isset($_GET['comment'], $_GET['id'])) {
    $response = Controller::InsertComment($_GET['comment'], (int)$_GET['id']);
}
elseif ($path === 'registerForm') {
    $response = Controller::registerForm();
}
elseif ($path === 'registerAnswer') {
    $response = Controller::registerUser();
}
else {
    $response = Controller::error404();
}
