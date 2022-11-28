<?php
require 'functions.php';

// ketika tombol register ditekan, proses fungsi registrasi
if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        $_SESSION['success_regis'] = true;
        setcookie('username', $_POST['username'], time() + 120);
        setcookie('password', $_POST['password'], time() + 120);
        // header('Location: login.php');
        // set session success_regis = true
    } else {
        $_SESSION['error_regis'] = true;
        echo mysqli_error($conn);
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
    <title>Halaman Registrasi - PWEB</title>

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
            text-transform: none;
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
            margin-top: 7rem;
            margin-bottom: 7rem;
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
        <h1>Halaman Registrasi</h1>
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username..." autocomplete="off" required autofocus>
            </li>

            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password..." autocomplete="off" required>
            </li>

            <li>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password..." autocomplete="off" required>
            </li>

            <li>
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" autocomplete="off" required>
            </li>

            <li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email anda..."autocomplete="off" required>
            </li>

            <li>
                <label for="agama">Agama</label>
                <select name="agama" id="agama">
                    <option value="" selected disabled>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </li>

            <li>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin">
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </li>
            <br>
            <div class="flex-footer">
                <div class="footer">
                    <button type="submit" name="register">Registrasi</button>
                </div>
            </div>
            <div class="flex-footer">
                <div class="footer">
                <p>Sudah punya akun? <a href="login.php">Login</a></p>
                </div>
            </div>
            
        </ul>
    </form>

    <!-- Bootstrap JS Dropdown Navbar -->
    <script src="../assets/js/dropdown.js"></script>

    <!-- Tilt JS -->
    <script src="../assets/js/vanilla-tilt.js"></script>

    <!--? jQuery CDN -->
    <script src="../assets/js/jquery-3.6.1.min.js"></script>

    <!-- My JS -->
    <script src="../assets/js/script.js"></script>

    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
        // if isset $_SESSION['succes_regis'] 
        <?php if (isset($_SESSION['success_regis'])) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Berhasil',
                    text: 'Silahkan Login',
                    confirmButtonText: '<a href="login.php" style="color:#fff;">Login</a>',
                    timer: 1500,
                })
            <?php unset($_SESSION['succes_regis']);} ?>

        // if isset $_SESSION['error_regis']
        <?php if (isset($_SESSION['error_regis'])) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Registrasi Gagal',
                    text: 'Silahkan Coba Lagi',
                    showConfirmButton: false,
                    timer: 1500
                })
            <?php unset($_SESSION['error_regis']);} ?>
            // if isset $_SESSION['error_regis']
        <?php if (isset($_SESSION['username_exist'])) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Registrasi Gagal',
                    text: 'Username Sudah ada',
                    showConfirmButton: false,
                    timer: 1500
                })
            <?php unset($_SESSION['username_exist']);} ?>
            // if isset $_SESSION['error_regis']
        <?php if (isset($_SESSION['salah_konfirmasi'])) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Registrasi Gagal',
                    text: 'Password tidak sama',
                    showConfirmButton: false,
                    timer: 1500
                })
            <?php unset($_SESSION['salah_konfirmasi']);} ?>
    </script>
</body>
</html>