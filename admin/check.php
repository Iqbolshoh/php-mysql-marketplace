<?php
session_start();

include '../config.php';
$query = new Database();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/");
    exit;
}

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: ../login/");
    exit;
}

$userStatus = $query->select('accounts', 'status', 'WHERE id = "' . $_SESSION['id'] . '"');
if (!isset($userStatus[0]['status']) || empty($userStatus[0]['status']) || $userStatus[0]['status'] === 'blocked') {
    header("Location: ../blocked_page.php");
    exit;
}

if (!isset($_SESSION['role']) || empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $roles = [
        'seller' => '../seller/',
        'user' => '../',
    ];

    if (isset($roles[$_SESSION['role']])) {
        header("Location: " . $roles[$_SESSION['role']]);
    } else {
        header("Location: ../login/");
    }
    exit;
}
?>