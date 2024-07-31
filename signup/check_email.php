<?php
include '../config.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = new Query();
    $result = $query->executeQuery("SELECT * FROM accounts WHERE email='$email'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
