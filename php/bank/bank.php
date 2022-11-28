<?php
// session_start();
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
$totaldata = count(query('SELECT * FROM bank'));
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

$bank = $conn->query(
    'SELECT player.id_player, player.username, bank.* FROM bank, player WHERE bank.id_bank = player.id_bank ORDER BY bank.id_bank ASC LIMIT ' .
        $halamanawal .
        ',' .
        $jumlahdataperhalaman
);
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

    <!-- Link Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->

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

        .modal-body {
            height: 100%;
        }

        #keyword {
            margin: 0px 0px 1rem 0px;
            width: 24rem;
        } 
    </style>
</head>
<body class="p-2 hidden">
    <div class="preloader" id="preloader">
      <div class="loader" id="loader"></div>
    </div>

    <!--?======================== Navbar start ========================= -->
    <nav class="navbar">
      <a href="../../index.php" class="logo">
        <img src="../../assets/img/erpg.webp" alt="logo" style="width: 40px; height: 40px" />
        <h4>Epic RPG</h4>
      </a>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Bank </a>
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
        <marquee behavior="alternate" direction=""><h1>Bank User Epic RPG</h1></marquee>
    
        
        <input class="" width="30" type="search" autofocus="" placeholder="Cari.." autocomplete="off" id="keyword" name="keyword" style="margin-bottom: 1rem;">

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>coins</label>
                                        <input type="text" name="coins" id="coins" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>bonus</label>
                                        <input type="text" name="bonus" id="bonus" class="form-control">
                                    </div>
                                </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="tbl-disabled" data-bs-dismiss="modal" id="tutup-modal">Close</button>
                <button type="submit" class="tbl-tambah" id="tbl-ubah-submit">Save Changes</button>
            </div>
            </div>
            </div>
        </div>
        
        <!-- make show table php -->
        <?php $no = $halamanawal + 1;
// $sql = 'SELECT * FROM biodata_xiirpl3 ORDER BY no_hp ASC';
// $result = $conn->query($sql);
?>
        <div id="container1">
            <table class="" cellpadding="15" cellspacing="0" id="data-table" class="data-table">
                <thead>
                    <tr class="">
                        <th>#</th>
                        <th>Username</th>
                        <th>Coins</th>
                        <th>Bonus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php while ($show = mysqli_fetch_array($bank)) { ?>
                    <!-- <tbody> -->
                        <tr id="<?= $show['id_player'] ?>">
                            <td><?= $no++ ?></td>
                            <td id="username"><?= $show['username'] ?></td>
                            <td id="coins"><?= $show['coins'] ?></td>
                            <td id="bonus"><?= $show['bonus'] ?></td>
                            <td>
                                <button class="tbl-edit" id="tbl-edit" name="button" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
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


    <!-- JS Dropdown Navbar -->
    <script src="../../assets/js/dropdown.js"></script>

    <!-- Tilt JS -->
    <script src="../../assets/js/vanilla-tilt.js"></script>

    <!--? jQuery CDN -->
    <script src="../../assets/js/jquery-3.6.1.min.js"></script>

    <!-- My JS -->
    <script src="../../assets/js/script.js"></script>

    <!-- Sweet Alert -->
    <script src="../../assets/sweetalert/sweetalert2.min.js"></script>

    <!-- Live Search JS -->
    <script src="searchBank.js"></script>

    <script>
        $(document).on('click', '#tbl-edit', function(e) {
            e.preventDefault();
            
            let id = $(this).closest('tr').attr('id');
            let username = $(this).closest('tr').find('#username').text();

            // Bank
            // split dan hilangkan spasi setelah nya
            // bank
            let coins = $(this).closest('tr').find('#coins').text();
            let bonus = $(this).closest('tr').find('#bonus').text();

            // change modalUbah input value

            $(document).ready(function() {
                // if modalUbah show
                $('#modalEdit').on('shown.bs.modal', function() {
                    // set id
                    $('#id').val(id);
                    $('#username').val(username);

                    // Quest
                      // Quest
                    $('#coins').val(coins);
                    $('#bonus').val(bonus);
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
                        coins: $('#coins').val(),
                        bonus: $('#bonus').val(),
                        action: 'ubahBank'
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
    </script>
</body>
</html>