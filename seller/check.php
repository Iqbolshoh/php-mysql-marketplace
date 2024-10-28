<?php

include '../config.php';
$query = new Query();

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/");
    exit;
}

if ($query->isBlocked()) {
    header("Location: ../blocked_page.php");
    exit;
}

if ($_SESSION['role'] !== 'seller') {
    header("Location: ../roles.php");
    exit;
}
