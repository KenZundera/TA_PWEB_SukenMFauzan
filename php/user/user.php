<?php
// require '../../vendor/autoload.php';
require '../functions.php';

ob_start();
session_start();

// Jika session login tidak ada maka kembali ke halaman login
if (!isset($_SESSION['login'])) {
    header('location:../login.php');
    exit();
}

// $faker = new Faker\Generator();

// $faker->addProvider(new Faker\Provider\id_ID\Profile($faker));
// $faker->addProvider(new Faker\Provider\id_ID\User($faker));

// konfigurasi pagination
$jumlahdataperhalaman = 10;
$totaldata = count(query('SELECT * FROM player'));
$jumlahhalaman = ceil($totaldata / $jumlahdataperhalaman);
if (isset($_GET['halaman'])) {
    $halamanberapa = $_GET['halaman'];
} else {
    $halamanberapa = 1;
}

$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;

// deskripsikan bisa pakai keduanya. (halaman dan tidak ada)
$awaldata = $jumlahdataperhalaman * $halamanberapa - $jumlahdataperhalaman;

$Previous = $halaman - 1;
$Next = $halaman + 1;

$halamanawal =
    $halaman > 1 ? $halaman * $jumlahdataperhalaman - $jumlahdataperhalaman : 0;

// // ambil data atau query data siswa
$player = $conn->query(
    'SELECT profile.*, inventory.*, bank.*, professions.*, achievements.*, horse.tier, horse.type, horse.level as horse_level, horse.epicness, quest.*, player.* FROM player, profile, inventory, bank, professions, achievements, horse, quest WHERE player.id_profile = profile.id_profile AND player.id_inventory = inventory.id_inventory AND player.id_bank = bank.id_bank AND player.id_professions = professions.id_professions AND player.id_achievements = achievements.id_achievements AND player.id_horse = horse.id_horse AND player.id_quest = quest.id_quest ORDER BY player.id_player ASC LIMIT ' .
        $halamanawal .
        ',' .
        $jumlahdataperhalaman
);

// // tombol cari ditekan
// if (isset($_POST['cari'])) {
//     $siswa = cari($_POST['keyword']);
// }
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
    <link rel="stylesheet" href="../../assets/style/table.css" />
    <link rel="stylesheet" href="../../assets/style/balloon.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../assets/fonts/ABeeZee-Regular.ttf" />

    <!--? Favicon -->
    <link id="favicon" rel="shortcut icon" href="../../assets/img/erpg.webp" type="image/x-png" />

    <!--? Font Awesome -->
    <script src="https://kit.fontawesome.com/92333b2848.js" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="../../assets/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../assets/sweetalert/sweetalert2.min.css">

    <style>
        .username {
            border: none;
            color: rgb(255, 255, 255);
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 8px 2px;
            border-radius: 0.375rem;
        }
        .header-m {
            margin-bottom: 5px;
        }
        .kiri-form {
            float: right;
        }

        table thead tr th {
            background-color: #000;
            color: #fff;
        }
        
        table tr:nth-child(even) {
            background-color: #212529;
        }

        table tr:nth-child(odd) {
            background-color: #2c3034;
        }

        .cf {
            content: "";
            display: table;
            clear: both;
        }

        h1 {
            font-size: 2.5rem;
            color: #fff;
            font-weight: bold;
            margin-top: 10px;
        }

        .data-nf {
            /* make class data-nf alert danger */
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            margin: 0px 0px 10px 0px;
            border-radius: 0.375rem;
            max-width: 50%;
        }
    </style>
</head>
<body class="p-2 hidden">
    <div class="preloader" id="preloader">
      <div class="loader" id="loader"></div>
    </div>

    <audio hiddens> 
        <source src="assets/audio/omaga.mp3" type="audio/mpeg">
    </audio>

        <!--?======================== Navbar start ========================= -->
    <nav class="navbar">
      <a href="../../index.php" class="logo">
        <img src="../../assets/img/erpg.webp" alt="logo" style="width: 40px; height: 40px" />
        <h4>Epic RPG</h4>
      </a>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> User </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../user/user.php">User</a></li>
            <li><a class="dropdown-item" href="../profile/profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="../inventory/inventory.php">Inventory</a></li>
            <li><a class="dropdown-item" href="../bank/bank.php">Bank</a></li>
            <li><a class="dropdown-item" href="../professions/professions.php">Professions</a></li>
            <li><a class="dropdown-item" href="../quest/quest.php">Quest</a></li>
            <li><a class="dropdown-item" href="../horse/horse.php">Horse</a></li>
            <li><a class="dropdown-item" href="../achievements/achievements.php">Achievements</a></li>
          </ul>
        </li>
        <li><a href="../../Portfolio/index.php">Portfolio</a></li>
        <li>
            <!-- if session login is true  -->
         <?php if (isset($_SESSION['username'])) { ?>
            <a href="../logout.php">Logout</a>
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

    <section class="content" id="content">
        <marquee behavior="alternate" direction=""><h1>User Epic RPG</h1></marquee>
    
        
        <!-- <form action="" method="post" class="header-m"> -->
            <button name="button" class="tbl-submit" id="tbl-tambah-data" role="button" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
            <input class="" width="30" type="search" autofocus="" placeholder="Cari.." autocomplete="off" id="keyword" name="keyword">
            <!-- <button class="btn btn-outline-success" type="submit" id="tombol-cari" name="cari">Cari</button> -->
            <!-- Button trigger modal -->

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEdit">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="post" action="" id="formUbah">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" name="level" id="level" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>ATK</label>
                                        <input type="text" name="atk" id="atk" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>DEF</label>
                                        <input type="text" name="def" id="def" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Hp</label>
                                        <input type="text" name="hp" id="hp" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Sword</label>
                                        <input type="text" name="sword" id="sword" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>armor</label>
                                        <input type="text" name="armor" id="armor" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>log</label>
                                        <input type="text" name="log" id="log" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>fish</label>
                                        <input type="text" name="fish" id="fish" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>fruit</label>
                                        <input type="text" name="fruit" id="fruit" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>drop item</label>
                                        <input type="text" name="drop_item" id="drop_item" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Potion</label>
                                        <input type="text" name="potion" id="potion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Cookie</label>
                                        <input type="text" name="cookie" id="cookie" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>lootbox</label>
                                        <input type="text" name="lootbox" id="lootbox" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>seed</label>
                                        <input type="text" name="seed" id="seed" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>epic item</label>
                                        <input type="text" name="epic_item" id="epic_item" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>worker</label>
                                        <input type="text" name="worker" id="worker" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>crafter</label>
                                        <input type="text" name="crafter" id="crafter" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>lootboxer</label>
                                        <input type="text" name="lootboxer" id="lootboxer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>merchant</label>
                                        <input type="text" name="merchant" id="merchant" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>enchanter</label>
                                        <input type="text" name="enchanter" id="enchanter" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse tier</label>
                                        <input type="text" name="horse_tier" id="horse_tier" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse type</label>
                                        <input type="text" name="horse_type" id="horse_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse level</label>
                                        <input type="text" name="horse_level" id="horse_level" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse epicness</label>
                                        <input type="text" name="horse_epicness" id="horse_epicness" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>coins</label>
                                        <input type="text" name="coins" id="coins" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>quest</label>
                                        <input type="text" name="quest" id="quest" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>detail quest</label>
                                        <input type="text" name="detail_quest" id="detail_quest" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>progress</label>
                                        <input type="text" name="progress" id="progress" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>dungeon</label>
                                        <input type="text" name="dungeon" id="dungeon" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>working</label>
                                        <input type="text" name="working" id="working" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>multiplayer</label>
                                        <input type="text" name="multiplayer" id="multiplayer" class="form-control">
                                    </div>
                                </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>events</label>
                                            <input type="text" name="events" id="events" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>misc</label>
                                            <input type="text" name="misc" id="misc" class="form-control">
                                        </div>
                                    </div> 
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="tbl-disabled" data-bs-dismiss="modal" id="tutup-modal">Close</button>
                        <button type="submit" class="tbl-tambah" id="tbl-ubah-submit">Save Changes</button>
                    </div>
                    </div>
                </div>
            </div>

              <!-- Modal Tambah -->
              <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTambah">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="post" action="" id="formTambah">
                            <!-- <input type="hidden" name="id" id="id"> -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" name="level" class="level" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>ATK</label>
                                        <input type="text" name="atk" class="atk" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>DEF</label>
                                        <input type="text" name="def" class="def" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Hp</label>
                                        <input type="text" name="hp" class="hp" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Sword</label>
                                        <input type="text" name="sword" class="sword" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>armor</label>
                                        <input type="text" name="armor" class="armor" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>log</label>
                                        <input type="text" name="log" class="log" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>fish</label>
                                        <input type="text" name="fish" class="fish" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>fruit</label>
                                        <input type="text" name="fruit" class="fruit" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>drop item</label>
                                        <input type="text" name="drop_item" class="drop_item" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Potion</label>
                                        <input type="text" name="potion" class="potion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Cookie</label>
                                        <input type="text" name="cookie" class="cookie" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>lootbox</label>
                                        <input type="text" name="lootbox" class="lootbox" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>seed</label>
                                        <input type="text" name="seed" class="seed" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>epic item</label>
                                        <input type="text" name="epic_item" class="epic_item" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>worker</label>
                                        <input type="text" name="worker" class="worker" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>crafter</label>
                                        <input type="text" name="crafter" class="crafter" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>lootboxer</label>
                                        <input type="text" name="lootboxer" class="lootboxer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>merchant</label>
                                        <input type="text" name="merchant" class="merchant" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2set">
                                    <div class="form-group">
                                        <label>enchanter</label>
                                        <input type="text" name="enchanter" class="enchanter" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse tier</label>
                                        <input type="text" name="horse_tier" class="horse_tier" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse type</label>
                                        <input type="text" name="horse_type" class="horse_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse level</label>
                                        <input type="text" name="horse_level" class="horse_level" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>horse epicness</label>
                                        <input type="text" name="horse_epicness" class="horse_epicness" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>coins</label>
                                        <input type="text" name="coins" class="coins" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>quest</label>
                                        <input type="text" name="quest" class="quest" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>detail quest</label>
                                        <input type="text" name="detail_quest" class="detail_quest" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>progress</label>
                                        <input type="text" name="progress" class="progress" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>dungeon</label>
                                        <input type="text" name="dungeon" class="dungeon" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>working</label>
                                        <input type="text" name="working" class="working" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>multiplayer</label>
                                        <input type="text" name="multiplayer" class="multiplayer" class="form-control">
                                    </div>
                                </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>events</label>
                                            <input type="text" name="events" class="events" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>misc</label>
                                            <input type="text" name="misc" class="misc" class="form-control">
                                        </div>
                                    </div> 
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="tbl-disabled" data-bs-dismiss="modal" id="tutup-modal">Close</button>
                        <button type="submit" class="tbl-tambah" id="tbl-tambah-submit">Save Changes</button>
                    </div>
                    </div>
                </div>
            </div>


        <!-- </form> -->
        <!-- make show table php -->
        <?php $no = $halamanawal + 1;
// $sql = 'SELECT * FROM biodata_xiirpl3 ORDER BY no_hp ASC';
// $sql = 'SELECT * FROM biodata_xiirpl3 ORDER BY no_hp ASC';
// $result = $conn->query($sql);
?>
        <div id="container1">
            <table class="data-table" cellpadding="15" cellspacing="0" id="data-table">
                <thead>
                    <tr class="">
                        <th>#</th>
                        <th>Username</th>
                        <th>Profile</th>
                        <th>Inventory</th>
                        <th>Profession</th>
                        <th>Horse</th>
                        <th>Bank</th>
                        <th>Quest</th>
                        <th>Achievements</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php while ($p = mysqli_fetch_array($player)) { ?>
                    <!-- <tbody> -->
                        <tr id="<?php echo $p['id_player']; ?>">
                            <td><?= $no++ ?></td>
                            <td id="username"><?= $p['username'] ?></td>
                            <td id="<?= $p['id_profile'] ?>" class="profile">
                                <li id="level">
                                     Level : <?= $p['level'] ?>   
                                </li>
                                <li id="atk">
                                    Atk : <?= $p['atk'] ?>
                                </li>
                                <li id="def">
                                    Def : <?= $p['def'] ?>
                                </li>
                                <li id="hp">
                                    Hp : <?= $p['hp'] ?>
                                </li>
                                <li id="sword">
                                    Sword : <?= $p['sword'] ?>
                                </li>
                                <li id="armor">
                                    Armor : <?= $p['armor'] ?>
                                </li>
                            </td>
                            <td id="<?= $p[
                                'id_inventory'
                            ] ?>"  class="inventory">
                                <ul>
                                <li id="log">
                                    Log : <?= $p['log'] ?>
                                </li>
                                <li id="fish">
                                    Fish : <?= $p['fish'] ?>
                                </li>
                                <li id="fruit">
                                    Fruit : <?= $p['fruit'] ?>
                                </li>
                                <li id="drop_item">
                                    Drop Item : <?= $p['drop_item'] ?>
                                </li>
                                <li id="potion">
                                    Potion : <?= $p['potion'] ?>
                                </li>
                                <li id="cookie">
                                    Cookie : <?= $p['cookie'] ?>
                                </li>
                                <li id="lootbox">
                                    Lootbox : <?= $p['lootbox'] ?>
                                </li>
                                <li id="seed">
                                    Seed : <?= $p['seed'] ?>
                                </li>
                                <li id="epic_item">
                                    Epic Item : <?= $p['epic_item'] ?>
                                </li> 
                                </ul>
                                
                            </td>
                            <td id="<?= $p[
                                'id_professions'
                            ] ?>" class="professions">
                                <li id="worker">
                                    Worker : <?= $p['worker'] ?>
                                </li>
                                <li id="crafter">
                                    Crafter : <?= $p['crafter'] ?>
                                </li>
                                <li id="lootboxer">
                                    Lootboxer : <?= $p['lootboxer'] ?>
                                </li>
                                <li id="merchant">
                                    Merchant : <?= $p['merchant'] ?>
                                </li>
                                <li id="enchanter">
                                    Enchanter : <?= $p['enchanter'] ?>
                                </li>
                            </td>
                            <td id="<?= $p['id_horse'] ?>" class="horse">
                                <li id="horse_tier">
                                        Tier : <?= $p['tier'] ?>
                                </li>
                                <li id="horse_type">
                                Type : <?= $p['type'] ?>
                                </li>
                                <li id="horse_level">Level : <?= $p[
                                    'horse_level'
                                ] ?>
                                </li>
                                <li id="horse_epicness">
                                    Epicness : <?= $p['epicness'] ?>
                                </li>
                            </td>
                            <td id="<?= $p[
                                'id_bank'
                            ] ?>" class="bank">Coins : <?= $p['coins'] ?>
                            </td>
                            <td id="<?= $p['id_quest'] ?>" class="quest"><?= $p[
    'quest'
] ?></td>
<td hidden id="detail_quest"><?= $p['detail_quest'] ?></td>
                            <td id="<?= $p[
                                'id_achievements'
                            ] ?>" class="achievements">
                                <li id="progress">
                                  Progress : <?= $p['progress'] ?>/82
                                </li>
                                <li  id="dungeon">
                                    Dungeons : <?= $p['dungeon'] ?>/35
                                </li>
                                <li id="working">
                                    Working : <?= $p['working'] ?>/43
                                </li>
                                <li  id="multiplayer">
                                    Multiplayer : <?= $p['multiplayer'] ?>/33
                                </li>
                                <li id="events">
                                    Events : <?= $p['events'] ?>/43
                                </li>
                                <li id="misc">
                                    Misc : <?= $p['misc'] ?>/48
                                </li>
                                 </td>
                            <td>

                                <button class="tbl-edit" id="tbl-edit" name="button" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                
                                <button class="tbl-hapus" id="tbl-hapus" name="button"><i class="fa-sharp fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    <!-- </tbody> -->
                        
                    <?php } ?>
            </table>
        </div>
    </section>

    <!--?======================== Pagination start ========================= -->
    <div class="pagination-flex">
        <div class="pagination">
                <ul class="page-list">
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman > 1) {
                        echo "href='?halaman=$Previous'";
                    } ?>>Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a  class="page-link" <?php if (
                            $halaman < $jumlahhalaman
                        ) {
                            echo "href='?halaman=$Next'";
                        } ?>>Next</a>
                    </li>
                </ul>
            </div>
    </div>
    <!--?======================== Pagination end ========================= -->

    <!--?======================== Footer start ========================= -->
    <footer class="footer">
      <h1 class="credit">Made with <i class="fa fa-heart pulse"></i> by <a href="https://github.com/KenZundera"> Suken M Fauzan</a></h1>
    </footer>
    <!--?======================== Footer end ========================= -->

    <!--? jQuery CDN -->
    <script src="../../assets/js/jquery-3.6.1.min.js"></script>

    <!-- JS Dropdown Navbar -->
    <script src="../../assets/js/dropdown.js"></script>

    <!-- Tilt JS -->
    <script src="../../assets/js/vanilla-tilt.js"></script>


    <!-- My JS -->
    <script src="../../assets/js/script.js"></script>
    
    <!-- Sweet Alert -->
    <script src="../../assets/sweetalert/sweetalert2.min.js"></script>

    <!-- Live Search JS -->
    <script src="searchUser.js"></script>

  </body>
    <script>
        function deleteplayer(id){
            $(document).ready(function(){
                $.ajax({
                     // Action
                    url: '../functions.php',
                    // Method
                    type: 'POST',
                    data: {
                    // Get value
                    id: id,
                    action: "deletePlayer"
                    },
                    success:function(response){
                    // Response is the output of action file
                    if(response == 1){               
                        document.getElementById(id).style.display = "none";
                    }
                    else if(response == 0){
                    }
                    }
                });
            });
        }

        $(document).on('click', '#tbl-hapus', function(e) {
            // e.preventDefault();
            // const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                if (result.isConfirmed) {
                    // use ajax to delete data
                    deleteplayer($(this).closest('tr').attr('id'));

                    Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success'
                    )
                }
            })
        })

        $(document).on('click', '#tbl-tambah', function(e) {
            e.preventDefault();

            // make modalTambah value empty
            $('#formUbah').trigger('reset');
            
        });

        $(document).on('click', '#tbl-tambah-submit', function(e) {
            e.preventDefault();
            let id = $('.id').val();
            let username = $('.username').val();
            let level = $('.level').val();
            let atk = $('.atk').val();
            let def = $('.def').val();
            let hp = $('.hp').val();
            let sword = $('.sword').val();
            let armor = $('.armor').val();
            let log = $('.log').val();
            let fish = $('.fish').val();
            let fruit = $('.fruit').val();
            let drop_item = $('.drop_item').val();
            let potion = $('.potion').val();
            let cookie = $('.cookie').val();
            let lootbox = $('.lootbox').val();
            let seed = $('.seed').val();
            let epic_item = $('.epic_item').val();
            let worker = $('.worker').val();
            let crafter = $('.crafter').val();
            let lootboxer = $('.lootboxer').val();
            let merchant = $('.merchant').val();
            let enchanter = $('.enchanter').val();
            let tier = $('.horse_tier').val();
            let type = $('.horse_type').val();
            let level_horse = $('.horse_level').val();
            let epicness = $('.horse_epicness').val();
            let coins = $('.coins').val();
            let quest = $('.quest').val();
            let detail_quest = $('.detail_quest').val();
            let progress = $('.progress').val();
            let dungeon = $('.dungeon').val();
            let working = $('.working').val();
            let multiplayer = $('.multiplayer').val();
            let events = $('.events').val();
            let misc = $('.misc').val();

            $(document).ready(function() {
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        id: id,
                        username: username,
                        level: level,
                        atk: atk,
                        def: def,
                        hp: hp,
                        sword: sword,
                        armor: armor,
                        log: log,
                        fish: fish,
                        fruit: fruit,
                        drop_item: drop_item,
                        potion: potion,
                        cookie: cookie,
                        lootbox: lootbox,
                        seed: seed,
                        epic_item: epic_item,
                        worker: worker,
                        crafter: crafter,
                        lootboxer: lootboxer,
                        merchant: merchant,
                        enchanter: enchanter,
                        tier: tier,
                        type: type,
                        level_horse: level_horse,
                        epicness: epicness,
                        coins: coins,
                        quest: quest,
                        detail_quest: detail_quest,
                        progress: progress,
                        dungeon: dungeon,
                        working: working,
                        multiplayer: multiplayer,
                        events: events,
                        misc: misc,
                        action: 'tambahPlayer'
                    },
                    success: function(response) {
                        console.log(response);
                        // $('#formTambah')[0].reset();
                        if(response == 1){        
                            Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambah',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // auto click close button modal
                            $('#tutup-modal').click();
                            // reload tr td data
                            $('#data-table').load(' #data-table');
                        })       
                        }else if(response == 0){
                            Swal.fire({
                            title: 'Gagal',
                            text: 'Data gagal ditambah',
                            icon: 'error',
                            confirmButtonText: 'OK'
                            })
                        }
                    }
                })
            })
        })

        $(document).on('click', '#tbl-edit', function(e) {
            e.preventDefault();
            
            let id = $(this).closest('tr').attr('id');
            let username = $(this).closest('tr').find('#username').text();

            // Profile
            // split dan hilangkan spasi setelah nya
            let level = $(this).closest('tr').find('#level').text().split(' : ')[1].trim();
            let atk = $(this).closest('tr').find('#atk').text().split(' : ')[1].trim();
            let def = $(this).closest('tr').find('#def').text().split(' : ')[1].trim();
            let hp = $(this).closest('tr').find('#hp').text().split(' : ')[1].trim();
            let sword = $(this).closest('tr').find('#sword').text().split(' : ')[1].trim();
            let armor = $(this).closest('tr').find('#armor').text().split(' : ')[1].trim();

            // bank
            let coins = $(this).closest('tr').find('.bank').text().split(' : ')[1].trim();

            // Inventory
            let log = $(this).closest('tr').find('#log').text().split(' : ')[1].trim();
            let fish = $(this).closest('tr').find('#fish').text().split(' : ')[1].trim();
            let fruit = $(this).closest('tr').find('#fruit').text().split(' : ')[1].trim();
            let drop_item = $(this).closest('tr').find('#drop_item').text().split(' : ')[1].trim();
            let potion = $(this).closest('tr').find('#potion').text().split(' : ')[1].trim();
            let cookie = $(this).closest('tr').find('#cookie').text().split(' : ')[1].trim();
            let lootbox = $(this).closest('tr').find('#lootbox').text().split(' : ')[1].trim();
            let seed = $(this).closest('tr').find('#seed').text().split(' : ')[1].trim();
            let epic_item = $(this).closest('tr').find('#epic_item').text().split(' : ')[1].trim();

            // Professions
            // worker crafter lootboxer merchant enchanter
            let worker = $(this).closest('tr').find('#worker').text().split(' : ')[1].trim();
            let crafter = $(this).closest('tr').find('#crafter').text().split(' : ')[1].trim();
            let lootboxer = $(this).closest('tr').find('#lootboxer').text().split(' : ')[1].trim();
            let merchant = $(this).closest('tr').find('#merchant').text().split(' : ')[1].trim();
            let enchanter = $(this).closest('tr').find('#enchanter').text().split(' : ')[1].trim();

            // Horse
            // tier type level epicness
            let tier = $(this).closest('tr').find('#horse_tier').text().split(' : ')[1].trim();
            let type = $(this).closest('tr').find('#horse_type').text().split(' : ')[1].trim();
            let level_horse = $(this).closest('tr').find('#horse_level').text().split(' : ')[1].trim();
            let epicness = $(this).closest('tr').find('#horse_epicness').text().split(' : ')[1].trim();

            // Quest
            let quest = $(this).closest('tr').find('.quest').text();
            let detail_quest = $(this).closest('tr').find('#detail_quest').text();

            // Achievements
            let progress = $(this).closest('tr').find('#progress').text().split(' : ')[1].split('/')[0].trim();
            let dungeon = $(this).closest('tr').find('#dungeon').text().split(' : ')[1].split('/')[0].trim();
            let working = $(this).closest('tr').find('#working').text().split(' : ')[1].split('/')[0].trim();
            let multiplayer = $(this).closest('tr').find('#multiplayer').text().split(' : ')[1].split('/')[0].trim();
            let events = $(this).closest('tr').find('#events').text().split(' : ')[1].split('/')[0].trim();
            let misc = $(this).closest('tr').find('#misc').text().split(' : ')[1].split('/')[0].trim();

            // change modalUbah input value

            $(document).ready(function() {
                // if modalUbah show
                $('#modalEdit').on('shown.bs.modal', function() {
                    // set id
                    $('#id').val(id);
                    $('#username').val(username);

                    // Profile
                    $('#level').val(level);
                    $('#atk').val(atk);
                    $('#def').val(def);
                    $('#hp').val(hp);
                    $('#sword').val(sword);
                    $('#armor').val(armor);

                    // bank
                    $('#coins').val(coins);

                    // Inventory
                    $('#log').val(log);
                    $('#fish').val(fish);
                    $('#fruit').val(fruit);
                    $('#drop_item').val(drop_item);
                    $('#potion').val(potion);
                    $('#cookie').val(cookie);
                    $('#lootbox').val(lootbox);
                    $('#seed').val(seed);
                    $('#epic_item').val(epic_item);

                    // Professions
                    $('#worker').val(worker);
                    $('#crafter').val(crafter);
                    $('#lootboxer').val(lootboxer);
                    $('#merchant').val(merchant);
                    $('#enchanter').val(enchanter);

                    // Horse
                    $('#horse_tier').val(tier);
                    $('#horse_type').val(type);
                    $('#horse_level').val(level_horse);
                    $('#horse_epicness').val(epicness);

                    // Quest
                    $('#quest').val(quest);
                    $('#detail_quest').val(detail_quest);

                    // Achievements
                    $('#progress').val(progress);
                    $('#dungeon').val(dungeon);
                    $('#working').val(working);
                    $('#multiplayer').val(multiplayer);
                    $('#events').val(events);
                    $('#misc').val(misc);
                })
            });
        })

        
        $(document).on('click', '#tbl-ubah-submit', function(e) {
            e.preventDefault();
            // get data from td using id
            
            $(document).ready(function() {
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        id: $('#id').val(),
                        username: $('#username').val(),
                        level: $('#level').val(),
                        atk: $('#atk').val(),
                        def: $('#def').val(),
                        hp: $('#hp').val(),
                        sword: $('#sword').val(),
                        armor: $('#armor').val(),
                        log: $('#log').val(),
                        fish: $('#fish').val(),
                        fruit: $('#fruit').val(),
                        drop_item: $('#drop_item').val(),
                        potion: $('#potion').val(),
                        cookie: $('#cookie').val(),
                        lootbox: $('#lootbox').val(),
                        seed: $('#seed').val(),
                        epic_item: $('#epic_item').val(),
                        worker: $('#worker').val(),
                        crafter: $('#crafter').val(),
                        lootboxer: $('#lootboxer').val(),
                        merchant: $('#merchant').val(),
                        enchanter: $('#enchanter').val(),
                        tier: $('#horse_tier').val(),
                        type: $('#horse_type').val(),
                        level_horse: $('#horse_level').val(),
                        epicness: $('#horse_epicness').val(),
                        coins: $('#coins').val(),
                        quest: $('#quest').val(),
                        detail_quest: $('#detail_quest').val(),
                        progress: $('#progress').val(),
                        dungeon: $('#dungeon').val(),
                        working: $('#working').val(),
                        multiplayer: $('#multiplayer').val(),
                        events: $('#events').val(),
                        misc: $('#misc').val(),
                        action: 'ubahPlayer'
                    },
                    success: function(response) {
                        // console.log(response);
                        // reset form
                        // $('#formUbah').trigger('reset');
                        // $('#formTambah')[0].reset();
                        if(response == 1){        
                            Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil diubah',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // reset form
                            // $('#formUbah')[0].reset();
                            // auto click close button modal
                            $('#tutup-modal').click();
                            // reload tr td data
                            $('#data-table').load(' #data-table');
                        })       
                        }else if(response == 0){
                            Swal.fire({
                            title: 'Gagal',
                            text: 'Data gagal diubah',
                            icon: 'error',
                            confirmButtonText: 'OK'
                            })
                            $('#tutup-modal').click();
                            // reload tr td data
                            $('#data-table').load(' #data-table');
                        }
                    }
                })
            })
        })

        $('#modalEdit').on('shown.bs.modal', function(event) {
        })

        $('#modalTambah').on('shown.bs.modal', function(event) {
        })

    </script>

</body>
</html>