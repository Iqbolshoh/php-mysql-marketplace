<?php
session_start();

include '../config.php';
$query = new Query();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($user['role'] == 'admin') {
        header("Location: ../admin/");
        exit;
    } else if ($user['role'] == 'seller') {
        header("Location: ../seller/");
    } else {
        header("Location: ../");
        exit;
    }
}

if (isset($_COOKIE['username']) && isset($_COOKIE['session_token'])) {

    if (session_id() !== $_COOKIE['session_token']) {
        session_write_close();
        session_id($_COOKIE['session_token']);
        session_start();
    }

    $username = $_COOKIE['username'];

    $result = $query->select('accounts', 'id, role', "username = $username");

    if (!empty($result)) {
        $user = $result[0];

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: ../admin/");
            exit;
        } else if ($user['role'] == 'seller') {
            header("Location: ../seller/");
        } else {
            header("Location: ../");
            exit;
        }
    }
}

$msg = [];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    setcookie('username', $username, time() + (86400 * 30), "/", "", true, true);
    setcookie('session_token', session_id(), time() + (86400 * 30), "/", "", true, true);

    $existingUser = $query->executeQuery("SELECT * FROM accounts WHERE username='$username' OR email='$email' OR number='$number'");

    if ($existingUser->num_rows > 0) {
        $msg = [
            "title" => "Error!",
            "text" => "Username, email, or phone number already exists."
        ];
    } else {
        $result = $query->registerUser($name, $number, $email, $username, $password, $role);
        $userData = $query->executeQuery("SELECT * FROM accounts WHERE username='$username'")->fetch_assoc();

        if (!empty($result) && !empty($userData) && isset($userData['id'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $userData['id'];
            $_SESSION['name'] = $name;
            $_SESSION['number'] = $number;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            $msg = [
                "title" => "Success!",
                "text" => "Registration completed!",
                "icon" => "success"
            ];

            header("Location: ../");
            exit;
        } else {
            $msg = [
                "title" => "Error!",
                "text" => "An error occurred while saving the data."
            ];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        body {
            padding: 40px 0px !important;
        }
    </style>
</head>

<body>
    <?php if (!empty($msg)): ?>
        <script>
            Swal.fire({
                title: "<?php echo $msg['title']; ?>",
                text: "<?php echo $msg['text']; ?>",
                icon: "<?php echo $msg['icon'] ?? 'error'; ?>",
                confirmButtonText: "OK"
            });
        </script>
    <?php endif; ?>

    <div class="form-container">
        <h2>Sign Up</h2>

        <form method="post" action="" enctype="multipart/form-data" id="signup-form">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" placeholder="Full Name" required maxlength="30">
            </div>

            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" name="number" placeholder="Tel: +998991234567" required maxlength="20">
                <p class="error-message" id="number-error"></p>
            </div>

            <div class="form-group">
                <label for="role" class="font-weight-bold">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="user">User</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" required maxlength="255">
                <p class="error-message" id="email-error"></p>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required maxlength="255">
                <p class="error-message" id="username-error"></p>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Password" required maxlength="255">
                    <button type="button" id="toggle-password" class="password-toggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>

            <div class="text-center">
                <p>Already have an account? <a href="../login/">Log in</a></p>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const toggleIcon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });

        document.querySelector('input[name="username"]').addEventListener('input', function() {
            const username = this.value;
            const errorElement = document.getElementById('username-error');
            const regex = /^[a-zA-Z0-9_]+$/;

            if (username && !regex.test(username)) {
                errorElement.textContent = 'Username can only contain letters, numbers, and underscores!';
            } else {
                errorElement.textContent = '';
            }
        });

        document.querySelector('input[name="number"]').addEventListener('input', function() {
            const number = this.value;
            const errorElement = document.getElementById('number-error');
            const regex = /^[+\d\s()-]+$/;

            if (number && !regex.test(number)) {
                errorElement.textContent = 'Phone number must be valid!';
            } else {
                errorElement.textContent = '';
            }
        });

        document.querySelector('input[name="email"]').addEventListener('input', function() {
            const email = this.value;
            const errorElement = document.getElementById('email-error');
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email && !regex.test(email)) {
                errorElement.textContent = 'Invalid email address!';
            } else {
                errorElement.textContent = '';
            }
        });

        function hideErrorMessages() {
            document.querySelectorAll('.error-message').forEach(msg => msg.textContent = '');
        }

        setTimeout(hideErrorMessages, 4000);
    </script>
</body>


</html>