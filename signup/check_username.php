<?php
include '../config.php';
$query = new Database();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $result = $query->executeQuery("SELECT * FROM accounts WHERE username='$username'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
?>
