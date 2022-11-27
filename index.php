<?php
require 'php/functions.php';

ob_start();
session_start();

// // Jika session login tidak ada maka kembali ke halaman login
// if (!isset($_SESSION['login'])) {
//     header('location: php/login.php');
//     exit();
// }

//  var global user session
// $id_user = $_SESSION['username'];
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
    <title>Epic RPG</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/style/style.css" />
    <link rel="stylesheet" href="assets/style/balloon.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!--? Favicon -->
    <link id="favicon" rel="shortcut icon" href="assets/img/erpg.webp" type="image/x-png" />

    <!--? Font Awesome -->
    <script src="https://kit.fontawesome.com/92333b2848.js" crossorigin="anonymous"></script>
  </head>
  <body class="hidden">
    <div class="preloader" id="preloader">
      <div class="loader" id="loader"></div>
    </div>

    <!--?======================== Navbar start ========================= -->
    <nav class="navbar">
      <a href="/" class="logo">
        <img src="assets/img/erpg.webp" alt="logo" style="width: 40px; height: 40px" />
        <h4>Epic RPG</h4>
      </a>
      <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#commands" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Commands </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="php/user/user.php">User</a></li>
            <li><a class="dropdown-item" href="php/profile/profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="php/inventory/inventory.php">Inventory</a></li>
            <li><a class="dropdown-item" href="php/bank/bank.php">Bank</a></li>
            <li><a class="dropdown-item" href="php/professions/professions.php">Professions</a></li>
            <li><a class="dropdown-item" href="php/quest/quest.php">Quest</a></li>
            <li><a class="dropdown-item" href="php/horse/horse.php">Horse</a></li>
            <li><a class="dropdown-item" href="php/achievements/achievements.php">Achievements</a></li>
          </ul>
        </li>
        <li><a href="Portfolio/index.php">Portfolio</a></li>
        <li>
          <?php if (isset($_SESSION['username'])) { ?>
            <a href="php/logout.php">Logout</a>
          <?php } else { ?>
          <a href="php/login.php" aria-label="Login" data-balloon-pos="right" id="login-icon"><i class="fa-solid fa-right-to-bracket"></i></a>
          <?php } ?>
        </li>
      </ul>

      <div class="menu-toggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
    <!--?======================== Navbar end ========================= -->

    <!--?======================== Home start ========================= -->
    <section class="home" id="home">
      <div class="foto">
        <img data-tilt data-tilt-full-page-listening src="assets/img/erpg.webp" alt="Epic RPG" />
      </div>
      <div class="content">
        <h2>
          Hello, I'm<br />
          Epic RPG
        </h2>
        <p>Feel the <span class="typing-text"></span><span>|</span></p>
        <a href="https://top.gg/bot/555955826880413696/invite" class="invite" target="_blank"><span>Invite</span> </a>
        <a href="https://top.gg/bot/555955826880413696/vote" class="vote" target="_blank"><span>Vote Bot</span> </a>
      </div>
    </section>
    <!--?======================== Home end ========================= -->

    <!--?======================== About start ========================= -->
    <section class="about" id="about">
      <!--? about me start -->
      <h2 class="heading"><i class="fa-solid fa-circle-info"></i> About Epic RPG</h2>
      <div class="about-me">
        <div class="foto foto-kecil">
          <img data-tilt src="assets/img/erpg.webp" alt="Epic RPG" />
        </div>
        <div class="about-desc">
          <p>Bot Epic RPG adalah bot discord yang memiliki pengguna hampir 200 ribu, Bot ini dibuat oleh Developer dengan panggilan Lume yang bertujuan untuk menghibur keseharian orang.</p>
          <a href="https://top.gg/bot/555955826880413696/invite" class="cv" target="_blank"
            ><span>Invite <i class="fas fa-download"></i></span>
            <i class=""></i>
          </a>
        </div>
      </div>
      <!--? about me end -->
    </section>
    <!--?======================== About end ========================= -->

    <!--?======================== Commands start ========================= -->
    <section class="commands" id="commands">
      <h2 class="heading"><i class="fas fa-laptop-code"></i> Epic Command</h2>
      <div class="container">
        <div class="row" id="skillsContainer">
        <a href="php/user/user.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="profile" />
                <span>User</span>
              </div>
            </div>
          </a>
          <a href="php/profile/profile.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="profile" />
                <span>Profile</span>
              </div>
            </div>
          </a>
          <a href="php/inventory/inventory.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="inventory" />
                <span>Inventory</span>
              </div>
            </div>
          </a>
          <a href="php/bank/bank.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="bank" />
                <span>Bank</span>
              </div>
            </div>
          </a>
          <a href="php/professions/professions.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="professions" />
                <span>Professions</span>
              </div>
            </div>
          </a>
          <a href="/php/quest/quest.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="quest" />
                <span>Quest</span>
              </div>
            </div>
          </a>
          <a href="php/horse/horse.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="horse" />
                <span>Horse</span>
              </div>
            </div>
          </a>
          <a href="php/achievements/achievements.php">
            <div data-tilt class="bar">
              <div class="info">
                <img src="assets/img/erpg.webp" alt="achievements" />
                <span>Achievements</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
    <!--?======================== Commands end ========================= -->

    <!--?======================== Footer start ========================= -->
    <footer class="footer">
      <div class="box-container">
        <div class="box">
          <h3>Epic RPG Bot</h3>
          <p>Terimakasih sudah mengunjungi website Epic RPG. <br /></p>
        </div>

        <div class="box right">
          <h3>Contact Info</h3>
          <p><i class="fas fa-phone"></i>+62 822-6135-1195</p>
          <p><i class="fas fa-envelope"></i>fauzansuken@gmail.com</p>
          <p><i class="fas fa-map-marked-alt"></i>Pondok Gede, Bekasi. Indonesia</p>
          <div class="share">
            <a href="wa.me/6282261351195" class="fab fa-whatsapp" aria-label="Whatsapp" target="_blank"></a>
            <a href="https://github.com/KenZundera" class="fab fa-github" aria-label="GitHub" target="_blank"></a>
            <a href="https://instagram.com/ken.fauzan" class="fab fa-instagram" aria-label="instagram" target="_blank"></a>
          </div>
        </div>
      </div>

      <h1 class="credit">Made with <i class="fa fa-heart pulse"></i> by <a href="https://github.com/KenZundera"> Suken M Fauzan</a></h1>
    </footer>
    <!--?======================== Footer end ========================= -->

    <!-- Bootstrap JS Dropdown Navbar -->
    <script src="assets/js/dropdown.js"></script>

    <!-- Tilt JS -->
    <script src="assets/js/vanilla-tilt.js"></script>

    <!--? jQuery CDN -->
    <script src="assets/js/jquery-3.6.1.min.js"></script>

    <!-- My JS -->
    <script src="assets/js/script.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
