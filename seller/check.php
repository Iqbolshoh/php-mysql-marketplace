<?php

session_start();

include '../config.php';
$query = new Query();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/");
    exit;
}

if ($query->select('accounts', 'status', 'WHERE id = "' . $_SESSION['id'] . '"')[0]['status'] === 'blocked') {
    header("Location: ../blocked_page.php");
    exit;
}

if ($_SESSION['role'] !== 'seller') {
    $roles = [
        'admin' => '../admin/',
        'user' => '../',
    ];

    header("Location: " . $roles[$_SESSION['role']]);
    exit;
}
