<?php
include '../config.php';
$query = new Database();

if (isset($_POST['number'])) {
    $number = $_POST['number'];
    $result = $query->executeQuery("SELECT * FROM accounts WHERE number='$number'");

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo '';
    }
}
?>
