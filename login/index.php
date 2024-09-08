<?php

include '../config.php';
$query = new Query();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['loggedin'] === true) {
    header("Location: ../authentication.php");
    exit;
}

if (isset($_POST['submit'])) {

    $user = $query->authenticate($_POST['username'], $_POST['password'], 'accounts');

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['number'] = $user[0]['number'];
        $_SESSION['email'] = $user[0]['email'];
        $_SESSION['username'] = $user[0]['username'];
        $_SESSION['profile_image'] = $user[0]['profile_image'];
        $_SESSION['role'] = $user[0]['role'];

        header("Location: ../authentication.php");
        exit;
    } else {
        $error = "The login or password is incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <?php if (isset($error)) { ?>
        <p class="error"><?= $error ?></p><?php } ?>

    <form method="post" action="">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Submit">
        <p>Don't have an account? <a href="../signup/">Sign up</a></p>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var errorElement = document.querySelector('.error');
                if (errorElement) {
                    errorElement.remove();
                }
            }, 3000);
        });
    </script>
</body>

</html>