<?php
include '../config.php';

if (isset($_POST['number'])) {
    $number = $_POST['number'];
    $query = new Query();
    $result = $query->executeQuery("SELECT * FROM accounts WHERE number='$number'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
?>
