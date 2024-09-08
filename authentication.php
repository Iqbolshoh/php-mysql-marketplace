<?php

include 'config.php';
$query = new Query;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($query->isBlocked()) {
        header("Location: ./blocked_page.php");
        exit;
    } elseif ($_SESSION['role'] === 'admin') {
        header("Location: ./admin/");
        exit;
    } elseif ($_SESSION['role'] === 'seller') {
        header("Location: ./seller/");
        exit;
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: ./");
        exit;
    }
} else {
    header("Location: ./login/");
}
