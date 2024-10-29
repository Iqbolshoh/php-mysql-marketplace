<?php

session_start();

include './config.php';
$query = new Query();


$roleRedirects = [
    'admin' => './admin/',
    'seller' => './seller/',
    'user' => './',
];

if (isset($_SESSION['role'])) {
    header("Location: " . $roleRedirects[$_SESSION['role']]);
    exit;
}
