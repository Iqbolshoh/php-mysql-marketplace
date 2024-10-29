<?php

session_start();

include '../config.php';
$query = new Query();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'seller') {
    header("Location: ../login/");
    exit;
}
