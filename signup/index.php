<?php

session_start();
include '../config.php';
$query = new Query();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: ../");
    exit;
}

$msg = [];

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
        $msg = [
            "title" => "Xatolik!",
            "text" => "Mavjud username, email yoki telefon raqam."
        ];
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

            $msg = [
                "title" => "Muvaffaqiyat!",
                "text" => "Ro'yxatdan o'tdingiz!",
                "icon" => "success"
            ];

            header("Location: ../");
            exit;
        } else {
            $msg = [
                "title" => "Xatolik!",
                "text" => "Ma'lumotlarni saqlashda xatolik yuz berdi."
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
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="number">Number</label>
                <input type="phone" name="number" placeholder="Number" required>
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
                <label for="name">Name</label>
                <input type="email" name="email" placeholder="Email" required>
                <p class="error-message" id="email-error"></p>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required>
                <p class="error-message" id="username-error"></p>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required="" maxlength="255">
                    <button type="button" id="toggle-password" class="password-toggle"><i class="fas fa-eye"></i></button>
                </div>
            </div>

            <div class="form-group">
                <label for="file-input" class="font-weight-bold">Choose Image</label>
                <div class="custom-file">
                    <input type="file" id="file-input" class="custom-file-input" accept="image/*" name="image">
                    <label class="custom-file-label" for="file-input">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" id="submit" value="Submit">
            </div>

            <div class="text-center">
                <p>Already have an account? <a href="../login/">Log in</a></p>
            </div>
        </form>

    </div>

    <script>
        $('#file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const toggleIcon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
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
    <?php if (isset($msg)): ?>
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