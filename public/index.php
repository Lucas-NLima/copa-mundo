<?php
require_once '../config/config.php';
require_once '../app/models/Database.php';

$controller = $_GET['controller'] ?? 'selecao';
$action = $_GET['action'] ?? 'listar';

$controllerName = ucfirst($controller) . "Controller";
$controllerPath = "../app/controllers/$controllerName.php";

if (!file_exists($controllerPath)) {
    die("Controller não encontrado.");
}

require_once $controllerPath;

$conn = Database::conectar();
$obj = new $controllerName($conn);

if (!method_exists($obj, $action)) {
    die("Ação não encontrada.");
}

$obj->$action();
