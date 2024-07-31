<?php
include '../config.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = new Query();
    $result = $query->executeQuery("SELECT * FROM accounts WHERE username='$username'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
?>
