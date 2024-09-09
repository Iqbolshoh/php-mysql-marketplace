<?php

session_start();

include 'config.php';
$query = new Query();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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

if (isset($roleRedirects[$_SESSION['role']])) {
    header("Location: " . $roleRedirects[$_SESSION['role']]);
} else {
    header("Location: ./login/");
}
exit;

