<?php

session_start();

include '../config.php';
$query = new Query();

if ($_SESSION['loggedin'] === true) {
    header("Location: ../authentication.php");
    exit;
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $profile_image = $query->saveImage($_FILES['image'], "../images/users/");

    $existingUser = $query->executeQuery("SELECT * FROM accounts WHERE username='$username' OR email='$email' OR number='$number'");

    if ($existingUser->num_rows > 0) {
        $error = "Xatolik: Mavjud username, email yoki telefon raqam.";
    } else {
        $result = $query->registerUser($name, $number, $email, $username, $password, $profile_image, $role);

        if ($result) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $result;
            $_SESSION['name'] = $name;
            $_SESSION['number'] = $number;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['profile_image'] = $profile_image;
            $_SESSION['role'] = $role;

            header("Location: ../authentication.php");

            exit;
        } else {
            $error = "Xatolik: Ma'lumotlarni saqlashda xatolik yuz berdi";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="" enctype="multipart/form-data" id="signup-form">
        <h2>Sign Up</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="phone" name="number" placeholder="Number" required>
        <p class="error-message" id="number-error"></p>

        <select name="role" required>
            <option value="" disabled selected>Select Role</option>
            <option value="user">User</option>
            <option value="seller">Seller</option>
        </select>

        <input type="email" name="email" placeholder="Email" required>
        <p class="error-message" id="email-error"></p>

        <input type="text" name="username" placeholder="Username" required>
        <p class="error-message" id="username-error"></p>

        <input type="password" name="password" placeholder="Password" required>

        <div class="file-input-container">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file-input" accept="image/*" name="image">
                    <label class="custom-file-label" for="file-input">Choose Image</label>
                </div>
            </div>
        </div>

        <input type="submit" name="submit" value="Submit">
        <p>Already have an account? <a href="../login/">Log in</a></p>
    </form>

    <script>
        $('#file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>


    <script>
        $(document).ready(function() {
            $('input[name="number"]').on('input', function() {
                var number = $(this).val();
                if (number.length > 0 && !/^\d+$/.test(number)) {
                    $('#number-error').text('Nomer faqat sondan iborat bo\'lishi kerak');
                } else {
                    $('#number-error').text('');
                }
            });

            $('input[name="email"]').on('input', function() {
                var email = $(this).val();
                if (email.length > 0 && !/\S+@\S+\.\S+/.test(email)) {
                    $('#email-error').text('Xato email.');
                } else {
                    $('#email-error').text('');
                }
            });
        });

        $(document).ready(function() {
            function isOne(value, callback) {
                $.ajax({
                    url: 'check_username.php',
                    type: 'POST',
                    data: {
                        username: value
                    },
                    success: function(response) {
                        if (response === 'exists') {
                            callback(true);
                        } else {
                            callback(false);
                        }
                    }
                });
            }

            $('input[name="username"]').on('input', function() {
                var username = $(this).val();
                if (username.length > 0 && !/^[a-zA-Z0-9_]+$/.test(username)) {
                    $('#username-error').text('Username should contain only letters, digits, and underscores.');
                } else {
                    $('#username-error').text('');
                }
                if (username.length > 0) {
                    isOne(username, function(result) {
                        if (result) {
                            $('#username-error').text('Bunday username mavjud.');
                        } else {
                            $('#username-error').text('');
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            function isEmailExists(email, callback) {
                $.ajax({
                    url: 'check_email.php',
                    type: 'POST',
                    data: {
                        email: email
                    },
                    success: function(response) {
                        if (response === 'exists') {
                            callback(true);
                        } else {
                            callback(false);
                        }
                    }
                });
            }

            $('input[name="email"]').on('input', function() {
                console.log($('input[name="email"]').val())
                var email = $(this).val();
                if (email.length > 0 && !isValidEmail(email)) {
                    $('#email-error').text('Email haqiqiy emas.');
                } else {
                    $('#email-error').text('');
                }
                if (email.length > 0) {
                    isEmailExists(email, function(result) {
                        if (result) {
                            $('#email-error').text('Bunday email mavjud.');
                        } else {
                            $('#email-error').text('');
                        }
                    });
                }
            });

            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }
        });
        $(document).ready(function() {
            function isNumberExists(number, callback) {
                $.ajax({
                    url: 'check_number.php',
                    type: 'POST',
                    data: {
                        number: number
                    },
                    success: function(response) {
                        if (response === 'exists') {
                            callback(true);
                        } else {
                            callback(false);
                        }
                    }
                });
            }

            $('input[name="number"]').on('input', function() {
                var number = $(this).val();
                if (number.length > 0 && !/^\d+$/.test(number)) {
                    $('#number-error').text('Nomer faqat sondan iborat bo\'lishi kerak');
                } else {
                    $('#number-error').text('');
                }
                if (number.length > 0) {
                    isNumberExists(number, function(result) {
                        if (result) {
                            $('#number-error').text('Bunday raqam mavjud.');
                        } else {
                            $('#number-error').text('');
                        }
                    });
                }
            });
        });

        function hideErrorMessage() {
            $('.error').hide();
        }
    </script>
    <?php if (isset($error)): ?>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    hideErrorMessage();
                }, 4000);
            });
        </script>
    <?php endif ?>

</body>

</html>