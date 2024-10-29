<?php

include './config.php';
$query = new Query();

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ./login/");
    exit;
}

if ($query->select('accounts', 'status', 'WHERE id = "' . $_SESSION['id'] . '"')[0]['status'] === 'blocked') {
    header("Location: ./blocked_page.php");
    exit;
}

if ($_SESSION['role'] !== 'user') {
    header("Location: ./roles.php");
    exit;
}
