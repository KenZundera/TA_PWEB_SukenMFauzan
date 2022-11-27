<?php
require '../functions.php';

$keyword = $_GET['keyword'];

$jumlahdataperhalaman = 10;
$totaldata = count(query('SELECT * FROM inventory'));
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

$sql = "SELECT player.*, inventory.* 

    FROM inventory, player

    WHERE inventory.id_inventory = player.id_inventory AND
       (
        player.username LIKE '%$keyword%' OR
        inventory.log LIKE '%$keyword%' OR
        inventory.fish LIKE '%$keyword%' OR
        inventory.fruit LIKE '%$keyword%' OR
        inventory.drop_item LIKE '%$keyword%' OR
        inventory.potion LIKE '%$keyword%' OR
        inventory.cookie LIKE '%$keyword%' OR
        inventory.lootbox LIKE '%$keyword%' OR
        inventory.seed LIKE '%$keyword%' OR
        inventory.epic_item LIKE '%$keyword%'
       )
    ORDER BY inventory.id_inventory ASC
    ";

$conn->query($sql);

// make if keyword is empty then limit 10 and get halaman in url
if ($keyword == '') {
    $sql .= " LIMIT $halamanawal, $jumlahdataperhalaman";
}
?>
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
            margin-bottom: 20px;
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

        .data-nf {
            /* make class data-nf alert danger */
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            margin: 0px 0px 10px 0px;
            border-radius: 0.375rem;
            max-width: 100%;
        }
    </style>
<?php if ($conn->affected_rows < 1): ?>
    <div class="data-nf" role="alert">
        Data tidak ditemukan
    </div>
<?php else: ?>
    <table class="" cellpadding="15" cellspacing="0" id="data-table" class="data-table">
                <thead>
                    <tr class="">
                        <th>#</th>
                        <th>Username</th>
                        <th>Log</th>
                        <th>Fish</th>
                        <th>Fruit</th>
                        <th>Drop Item</th>
                        <th>Potion</th>
                        <th>Cookie</th>
                        <th>Lootbox</th>
                        <th>Seed</th>
                        <th>Epic Item</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php
                $no = 1 + $halamanawal;
                $inventory = $conn->query($sql);
                while ($show = mysqli_fetch_array($inventory)) { ?>
                    <!-- <tbody> -->
                        <tr id="<?= $show['id_player'] ?>">
                            <td><?= $no++ ?></td>
                            <td id="username"><?= $show['username'] ?></td>
                            <td id="log"><?= $show['log'] ?></td>
                            <td id="fish"><?= $show['fish'] ?></td>
                            <td id="fruit"><?= $show['fruit'] ?></td>
                            <td id="drop_item"><?= $show['drop_item'] ?></td>
                            <td id="potion"><?= $show['potion'] ?></td>
                            <td id="cookie"><?= $show['cookie'] ?></td>
                            <td id="lootbox"><?= $show['lootbox'] ?></td>
                            <td id="seed"><?= $show['seed'] ?></td>
                            <td id="epic_item"><?= $show['epic_item'] ?></td> 

                            <td>
                                <button class="tbl-edit" id="tbl-edit" name="button" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                    <!-- </tbody> -->
                        
                    <?php }
                ?>
            </table>
<?php endif; ?>
