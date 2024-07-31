<?php

include 'config.php';

$query = new Query;

if (!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] !== true or $query->isBlocked() === false) {
    header("Location: ./checkAuthentication.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blocked Page</title>
    <link rel="stylesheet" href="./css/blocked_page.css">
</head>

<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>Sorry, <span><?= $_SESSION['username'] ?></span>, your access to this page has been blocked.</p>
        <p>If you believe this is an error, please contact the site administrator.</p>
        <a href="https://t.me/+998997799333" class="contact-link">Contact Administrator</a>
        <a class="logout" href="./logout/">Logout</a>
    </div>

</body>

</html>