<?php
include '../config.php';
$query = new Database();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $result = $query->executeQuery("SELECT * FROM accounts WHERE email='$email'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
