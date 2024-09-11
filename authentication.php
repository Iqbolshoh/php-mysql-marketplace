<?php

session_start();
include 'config.php';
$query = new Query();

if (empty($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ./login/");
    exit;
}

if ($query->isBlocked()) {
    header("Location: ./blocked_page.php");
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

header("Location: ./login/");
exit;
