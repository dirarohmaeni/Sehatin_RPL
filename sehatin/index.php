<?php
include "config/database.php";
include "controllers/AuthController.php";
include "controllers/ObatController.php";

if(isset($_GET['logout'])){
    session_destroy();
    header("Location:index.php");
}

if(!isset($_SESSION['user_id'])){
    AuthController::login($conn);
    exit;
}

$action = $_GET['action'] ?? 'index';

if($action == 'tambah'){
    ObatController::tambah($conn);
}
elseif($action == 'edit'){
    ObatController::edit($conn, $_GET['id']);
}
elseif ($action == 'detail') {
    ObatController::detail($conn, $_GET['id']);
}
elseif($action == 'delete'){
    ObatController::delete($conn, $_GET['id']);
}
else{
    $data = ObatController::index($conn);
    include "views/obat/index.php";
}
