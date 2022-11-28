<?php
ob_start();
session_start();

require 'functions.php';

// Cara Bu Nanda
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM user WHERE username = '$username'"
    );

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // $_SESSION['login'] = true;
        $row = mysqli_fetch_assoc($result);

        // cek passwords
        if (password_verify($password, $row['password'])) {
            // set session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            setcookie('username', $_POST['username'], time() + 120);
            setcookie('password', $_POST['password'], time() + 120);
            setcookie('success', true, time() + 10);
            // header('Location: ../index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keyword" content="Suken M Fauzan, Bot Epic RPG, Tugas PWEB, Suken, Fauzan, Epic, RPG" />
    <meta name="author" content="Suken M Fauzan" />
    <meta name="description" content="Website bot discord Epic RPG ..." />
    <title>Login - PWEB</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/style/login.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!--? Favicon -->
    <link id="favicon" rel="shortcut icon" href="../assets/img/erpg.webp" type="image/x-png" />

    <!--? Font Awesome -->
    <script src="https://kit.fontawesome.com/92333b2848.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="../assets/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/sweetalert/sweetalert2.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            text-transform:none;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            margin: 1.25rem 0 1.25rem 0;
        }

        form {
            width: 100%;
            max-width: 600px;
            margin: 0rem auto;
            border-radius: 5px;
            font-size: 1rem;
            padding: 1.25rem;
            box-shadow: #fff 0 0 10px;
            margin-top: 10rem;
        }

        form ul {
            list-style: none;
        }

        form ul li {
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            margin-bottom: 30px;
            line-height: 1.5;
            font-size: 1rem;
        }

        form input:last-child {
            margin-bottom: 10px;
        }

        form input:focus {
            outline: none;
            box-shadow: #90c6fd 0px 0 5px 2px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;	
        }

        form input::placeholder {
            color: #999;
            font-size: 1rem;
        }

        form button {
            width: 30%;
            height: 40px;
            padding: 0.375rem 0.75rem;
            border: 0;
            border-radius: 5px;
            background-color: #0d6efd;
            color: #fff;
            cursor: pointer;
            margin: 0 auto;
            font-size: 1rem;
            line-height: 1.5rem;
            text-align: center;
        }

        form button:hover {
            background-color: #1b82e9;
        }

        form .error {
            color: #ff0000;
            font-size: 12px;
        }

        .data-nf {
            /* make class data-nf alert danger */
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            margin: 0px 0px 20px 0px;
            border-radius: 0.375rem;
            max-width: 100%;
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        img {
            border-radius: 10px;
        }
        
    </style>
</head>

<body class="hidden">
    <div class="preloader" id="preloader">
      <div class="loader" id="loader"></div>
    </div>

    <audio hidden id="audio"> 
        <source src="../assets/audio/epic-song.mp3" type="audio/mpeg">
    </audio>

    <form action="" method="post">
        <h1>Halaman Login</h1>
        <?php if (isset($_GET['gagal'])) { ?>
            <tr>
                <td>
                    <div class="data-nf" role="alert">
                        Sorry, Username / Password doesn't match
                    </div>
                </td>
            </tr>
        <?php } ?>
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username..." autocomplete="off" required autofocus 
                <?php if (isset($_COOKIE['username'])) { ?>
                    value="<?= $_COOKIE['username'] ?>"
                    <?php } ?> >
            </li>

            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password..." autocomplete="off" required <?php if (
                    isset($_COOKIE['password'])
                ) { ?>
                    value="<?= $_COOKIE['password'] ?>"
                    <?php } ?> >
            </li>

            <div class="flex-footer">
                <div class="footer">
                    <button type="submit" name="login">Login</button>
                </div>
            </div>

            <div class="flex-footer">
                <div class="footer">
                    <p>Belum punya akun? <a href="register.php">Registrasi</a></p>
                </div>
            </div>
        </ul>
    </form> 

    <!--? jQuery CDN -->
    <script src="../assets/js/jquery-3.6.1.min.js"></script>

    <!-- My JS -->
    <script src="../assets/js/script.js"></script>

    <script>
        // if isset $_SESSION['succes_regis'] 
        <?php if (isset($_SESSION['login'])) { ?>
            // Swal with timer 
            Swal.fire({
                title: 'Login Success',
                text: 'Welcome to Epic RPG : <?= $_SESSION['username'] ?>',
                icon: 'success',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                showCancelButton: false,
                willClose: () => {
                    window.location.href = '../index.php';
                }
            })
            <?php } ?>
    </script>
</body>
</html>