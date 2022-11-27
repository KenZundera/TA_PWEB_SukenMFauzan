<?php
require '../functions.php';

$keyword = $_GET['keyword'];

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

$sql = "SELECT profile.*, inventory.*, bank.*, professions.*,   achievements.*, horse.id_horse, horse.tier, horse.type, horse.level as horse_level, horse.epicness, quest.*, player.* 

    FROM player, profile, inventory, bank, professions, achievements, horse, quest 

    WHERE player.id_profile = profile.id_profile AND
    player.id_inventory = inventory.id_inventory AND 
    player.id_bank = bank.id_bank AND 
    player.id_professions = professions.id_professions AND 
    player.id_achievements = achievements.id_achievements AND
    player.id_horse = horse.id_horse AND
    player.id_quest = quest.id_quest AND
    (  
    player.username LIKE '%$keyword%' OR 
    profile.level LIKE '%$keyword%' OR 
    profile.atk LIKE '%$keyword%' OR 
    profile.def LIKE '%$keyword%' OR 
    profile.hp LIKE '%$keyword%' OR 
    profile.sword LIKE '%$keyword%' OR 
    profile.armor LIKE '%$keyword%' OR 
    inventory.log LIKE '%$keyword%' OR 
    inventory.fish LIKE '%$keyword%' OR 
    inventory.fruit LIKE '%$keyword%' OR 
    inventory.drop_item LIKE '%$keyword%' OR 
    inventory.potion LIKE '%$keyword%' OR 
    inventory.cookie LIKE '%$keyword%' OR 
    inventory.lootbox LIKE '%$keyword%' OR 
    inventory.seed LIKE '%$keyword%' OR 
    inventory.epic_item LIKE '%$keyword%' OR 
    professions.worker LIKE '%$keyword%' OR 
    professions.crafter LIKE '%$keyword%' OR 
    professions.lootboxer LIKE '%$keyword%' OR 
    professions.merchant LIKE '%$keyword%' OR 
    professions.enchanter LIKE '%$keyword%' OR 
    horse.tier LIKE '%$keyword%' OR 
    horse.type LIKE '%$keyword%' OR 
    horse.level LIKE '%$keyword%' OR 
    horse.epicness LIKE '%$keyword%' OR 
    bank.coins LIKE '%$keyword%' OR 
    quest.quest LIKE '%$keyword%' OR 
    quest.detail_quest LIKE '%$keyword%' OR 
    achievements.progress LIKE '%$keyword%' OR 
    achievements.dungeon LIKE '%$keyword%' OR 
    achievements.working LIKE '%$keyword%' OR 
    achievements.multiplayer LIKE '%$keyword%' OR 
    achievements.events LIKE '%$keyword%' OR 
    achievements.misc LIKE '%$keyword%'
    )
    ORDER BY player.id_player ASC
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
                
                <?php
                $no = 1 + $halamanawal;
                $player = $conn->query($sql);
                while ($p = mysqli_fetch_array($player)) { ?>
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
                        
                    <?php }
                ?>
            </table>
<?php endif; ?>
