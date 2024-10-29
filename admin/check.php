<?php

session_start();

include '../config.php';
$query = new Query();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../roles.php");
    exit;
}