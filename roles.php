<?php

include './config.php';
$query = new Query();

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ./login/");
    exit;
}

$roleRedirects = [
    'admin' => './admin/',
    'seller' => './seller/',
    'user' => './',
];

if (isset($_SESSION['role'], $roleRedirects[$_SESSION['role']])) {
    header("Location: " . $roleRedirects[$_SESSION['role']]);
    exit;
}
