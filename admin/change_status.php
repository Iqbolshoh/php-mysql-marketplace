<?php include '../config.php';
$query = new Query;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$query->checkAdminRole() ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['userId']) && isset($_GET['newStatus']) && isset($_GET['userrole'])) {
    $userId = $_GET['userId'];
    $newStatus = $_GET['newStatus'];
    $query->update('accounts', ['status' => $newStatus], "where id = '$userId'");
    echo "Success";
    if ($_GET['userrole'] == 'seller') {
        header("Location: ./");
        exit;
    } else {
        header("Location: ../users.php");
    }
}

if ($_GET['userrole'] == 'seller') {
    header("Location: ./");
    exit;
} else {
    header("Location: users.php");
}
