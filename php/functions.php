<?php

// Koneksi Ke Database
$conn = mysqli_connect('localhost', 'root', '', 'epic_rpg');

function query($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

if (isset($_POST['action'])) {
    // Choose a function depends on value of $_POST["action"]
    if ($_POST['action'] == 'deletePlayer') {
        deletePlayer();
    } elseif ($_POST['action'] == 'ubahPlayer') {
        ubahPlayer();
    } elseif ($_POST['action'] == 'tambahPlayer') {
        tambahPlayer();
    } elseif ($_POST['action'] == 'ubahProfile') {
        ubahProfile();
    } elseif ($_POST['action'] == 'ubahQuest') {
        ubahQuest();
    } elseif ($_POST['action'] == 'ubahHorse') {
        ubahHorse();
    } elseif ($_POST['action'] == 'ubahInventory') {
        ubahInventory();
    } elseif ($_POST['action'] == 'ubahBank') {
        ubahBank();
    } elseif ($_POST['action'] == 'ubahProfessions') {
        ubahProfessions();
    } elseif ($_POST['action'] == 'ubahAchievements') {
        ubahAchievements();
    }
}

/*?======================== Player function start ========================= */
function tambahPlayer()
{
    global $conn;

    // count query player
    $count = count(query('SELECT * FROM player'));
    // $count + 1 to get new id
    $id = 1 + $count;

    // Profile Data Insert
    $level = $_POST['level'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $hp = $_POST['hp'];
    $sword = $_POST['sword'];
    $armor = $_POST['armor'];

    $tambahprofile = "INSERT INTO profile VALUES ('$id', '$level', '$atk', '$def', '$hp', '$sword', '$armor')";
    // mysqli_query($conn, $tambahprofile);

    // Inventory Data Insert
    $log = $_POST['log'];
    $fish = $_POST['fish'];
    $fruit = $_POST['fruit'];
    $drop_item = $_POST['drop_item'];
    $potion = $_POST['potion'];
    $cookie = $_POST['cookie'];
    $lootbox = $_POST['lootbox'];
    $seed = $_POST['seed'];
    $epic_item = $_POST['epic_item'];

    $tambahinventory = "INSERT INTO inventory VALUES ('$id', '$log', '$fish', '$fruit', '$drop_item', '$potion', '$cookie', '$lootbox', '$seed', '$epic_item')";

    // mysqli_query($conn, $tambahinventory);

    // Professions Data Insert
    $worker = $_POST['worker'];
    $crafter = $_POST['crafter'];
    $lootboxer = $_POST['lootboxer'];
    $merchant = $_POST['merchant'];
    $enchanter = $_POST['enchanter'];

    $tambahprofessions = "INSERT INTO professions VALUES ('$id', '$worker', '$crafter', '$lootboxer', '$merchant', '$enchanter')";
    // mysqli_query($conn, $tambahprofessions);

    // Horse Data Insert
    $tier = $_POST['tier'];
    $type = $_POST['type'];
    $level_horse = $_POST['level_horse'];
    $epicness = $_POST['epicness'];

    $tambahhorse = "INSERT INTO horse VALUES ('$id', '$tier', '$type', '$level_horse', '$epicness')";

    // mysqli_query($conn, $tambahhorse);

    // Bank Data Insert
    $coins = $_POST['coins'];
    $tambahcoins = "INSERT INTO bank VALUES ('$id', '$coins', '10.0%')";
    // mysqli_query($conn, $tambahcoins);

    // Quest Data Insert
    $quest = $_POST['quest'];
    $detail_quest = $_POST['detail_quest'];
    $tambahquest = "INSERT INTO quest VALUES ('$id', '$quest', '$detail_quest')";
    // mysqli_query($conn, $tambahquest);

    // Achievement Data Insert
    $progress = $_POST['progress'];
    $dungeon = $_POST['dungeon'];
    $working = $_POST['working'];
    $multiplayer = $_POST['multiplayer'];
    $events = $_POST['events'];
    $misc = $_POST['misc'];

    $tambahachievement = "INSERT INTO achievements VALUES ('$id', '$progress', '$dungeon', '$working', '$multiplayer', '$events', '$misc')";
    // mysqli_query($conn, $tambahachievement);

    // Player Data Insert
    $username = $_POST['username'];
    $tambahplayer = "INSERT INTO player VALUES ('$id', '$username', '$id', '$id', '$id', '$id', '$id', '$id', '$id')";
    // mysqli_query($conn, $tambahplayer);

    $insertAllPlayer = "INSERT INTO profile VALUES ('$id', '$level', '$atk', '$def', '$hp', '$sword', '$armor'); INSERT INTO inventory VALUES ('$id', '$log', '$fish', '$fruit', '$drop_item', '$potion', '$cookie', '$lootbox', '$seed', '$epic_item'); INSERT INTO professions VALUES ('$id', '$worker', '$crafter', '$lootboxer', '$merchant', '$enchanter'); INSERT INTO horse VALUES ('$id', '$tier', '$type', '$level_horse', '$epicness'); INSERT INTO bank VALUES ('$id', '$coins', '10.0%'); INSERT INTO quest VALUES ('$id', '$quest', '$detail_quest'); INSERT INTO achievements VALUES ('$id', '$progress', '$dungeon', '$working', '$multiplayer', '$events', '$misc'); INSERT INTO player VALUES ('$id', '$username', '$id', '$id', '$id', '$id', '$id', '$id', '$id')";

    mysqli_multi_query($conn, $insertAllPlayer);

    echo mysqli_affected_rows($conn);
}

function ubahPlayer()
{
    global $conn;

    // Profile Data Update
    $id = $_POST['id'];
    $username = $_POST['username'];
    $updateplayer = "UPDATE player SET username = '$username' WHERE id_player = '$id'";
    // mysqli_query($conn, $updateplayer);

    $level = $_POST['level'];
    $hp = $_POST['hp'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $sword = $_POST['sword'];
    $armor = $_POST['armor'];

    $updateprofile = "UPDATE profile
    SET level = '$level',
        atk = '$atk',
        def = '$def',
        hp = '$hp',
        sword = '$sword',
        armor = '$armor'
    WHERE id_profile = '$id'";
    // mysqli_query($conn, $updateprofile);

    // Inventory Data Update
    $log = $_POST['log'];
    $fish = $_POST['fish'];
    $fruit = $_POST['fruit'];
    $drop_item = $_POST['drop_item'];
    $potion = $_POST['potion'];
    $cookie = $_POST['cookie'];
    $lootbox = $_POST['lootbox'];
    $seed = $_POST['seed'];
    $epic_item = $_POST['epic_item'];

    $updateinventory = "UPDATE inventory
    SET log = '$log',
        fish = '$fish',
        drop_item = '$drop_item',
        potion = '$potion',
        cookie = '$cookie',
        lootbox = '$lootbox',
        seed = '$seed',
        epic_item = '$epic_item'
    WHERE id_inventory = '$id'";
    // mysqli_query($conn, $updateinventory);

    // Professions Data Update
    $worker = $_POST['worker'];
    $crafter = $_POST['crafter'];
    $lootboxer = $_POST['lootboxer'];
    $merchant = $_POST['merchant'];
    $enchanter = $_POST['enchanter'];

    $updateprofessions = "UPDATE professions
    SET worker = '$worker',
        crafter = '$crafter',
        lootboxer = '$lootboxer',
        merchant = '$merchant',
        enchanter = '$enchanter'
    WHERE id_professions = '$id'";
    // mysqli_query($conn, $updateprofessions);

    // Horse Data Update
    $tier = $_POST['tier'];
    $type = $_POST['type'];
    $level_horse = $_POST['level_horse'];
    $epicness = $_POST['epicness'];

    $updateHorse = "UPDATE horse
    SET tier = '$tier',
        type = '$type',
        level = '$level_horse',
        epicness = '$epicness'
    WHERE id_horse = '$id'";
    // mysqli_query($conn, $updateHorse);

    // Bank Data Update
    $coins = $_POST['coins'];
    $updateCoins = "UPDATE bank
    SET coins = '$coins'
    WHERE id_bank = '$id'";
    // mysqli_query($conn, $updateCoins);

    // Quest Data Update
    $quest = $_POST['quest'];
    $detail_quest = $_POST['detail_quest'];

    $updateQuest = "UPDATE quest
    SET quest = '$quest',
        detail_quest = '$detail_quest'
    WHERE id_quest = '$id'";
    // mysqli_query($conn, $updateQuest);

    // Achievement Data Update
    $progress = $_POST['progress'];
    $dungeon = $_POST['dungeon'];
    $working = $_POST['working'];
    $multiplayer = $_POST['multiplayer'];
    $events = $_POST['events'];
    $misc = $_POST['misc'];

    $updateAchievement = "UPDATE achievements
    SET progress = '$progress',
        dungeon = '$dungeon',
        working = '$working',
        multiplayer = '$multiplayer',
        events = '$events',
        misc = '$misc'
    WHERE id_achievements = '$id'";
    // mysqli_query($conn, $updateAchievement);

    $updatealldata = "UPDATE player, profile, inventory, professions, horse, bank, quest, achievements 
    SET player.username = '$username',
        profile.level = '$level',
        profile.atk = '$atk',
        profile.def = '$def',
        profile.hp = '$hp',
        profile.sword = '$sword',
        profile.armor = '$armor',
        inventory.log = '$log',
        inventory.fish = '$fish',
        inventory.fruit = '$fruit',
        inventory.drop_item = '$drop_item',
        inventory.potion = '$potion',
        inventory.cookie = '$cookie',
        inventory.lootbox = '$lootbox',
        inventory.seed = '$seed',
        inventory.epic_item = '$epic_item',
        professions.worker = '$worker',
        professions.crafter = '$crafter',
        professions.lootboxer = '$lootboxer',
        professions.merchant = '$merchant',
        professions.enchanter = '$enchanter',
        horse.tier = '$tier',
        horse.type = '$type',
        horse.level = '$level_horse',
        horse.epicness = '$epicness',
        bank.coins = '$coins',
        quest.quest = '$quest',
        quest.detail_quest = '$detail_quest',
        achievements.progress = '$progress',
        achievements.dungeon = '$dungeon',
        achievements.working = '$working',
        achievements.multiplayer = '$multiplayer',
        achievements.events = '$events',
        achievements.misc = '$misc'
    WHERE player.id_player = '$id'
        AND profile.id_profile = '$id'
        AND inventory.id_inventory = '$id'
        AND professions.id_professions = '$id'
        AND horse.id_horse = '$id'
        AND bank.id_bank = '$id'
        AND quest.id_quest = '$id'
        AND achievements.id_achievements = '$id'";

    mysqli_query($conn, $updatealldata);

    echo mysqli_affected_rows($conn);
}

function deletePlayer()
{
    global $conn;

    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM player WHERE id_player = '$id'");

    mysqli_query($conn, "DELETE FROM profile WHERE id_profile = '$id'");

    mysqli_query($conn, "DELETE FROM inventory WHERE id_inventory = '$id'");

    mysqli_query($conn, "DELETE FROM professions WHERE id_professions = '$id'");

    mysqli_query($conn, "DELETE FROM horse WHERE id_horse = '$id'");

    mysqli_query($conn, "DELETE FROM bank WHERE id_bank = '$id'");

    mysqli_query($conn, "DELETE FROM quest WHERE id_quest = '$id'");

    mysqli_query(
        $conn,
        "DELETE FROM achievements WHERE id_achievements = '$id'"
    );

    echo mysqli_affected_rows($conn);
}
/*?======================== Player function end ========================= */

/*?======================== Profile function start ========================= */
function ubahProfile()
{
    global $conn;

    $id = $_POST['id'];
    $level = $_POST['level'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $hp = $_POST['hp'];
    $sword = $_POST['sword'];
    $armor = $_POST['armor'];

    $updateProfile = "UPDATE profile
    SET level = '$level',
        atk = '$atk',
        def = '$def',
        hp = '$hp',
        sword = '$sword',
        armor = '$armor'
    WHERE id_profile = '$id'";

    mysqli_query($conn, $updateProfile);

    echo mysqli_affected_rows($conn);
}
/*?======================== Profile function end ========================= */

/*?======================== Inventory function start ========================= */
function ubahInventory()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $log = $_POST['log'];
    $fish = $_POST['fish'];
    $fruit = $_POST['fruit'];
    $drop_item = $_POST['drop_item'];
    $potion = $_POST['potion'];
    $cookie = $_POST['cookie'];
    $lootbox = $_POST['lootbox'];
    $seed = $_POST['seed'];
    $epic_item = $_POST['epic_item'];

    $updateInventory = "UPDATE inventory, player
    SET player.username = '$username',
        inventory.log = '$log',
        inventory.fish = '$fish',
        inventory.fruit = '$fruit',
        inventory.drop_item = '$drop_item',
        inventory.potion = '$potion',
        inventory.cookie = '$cookie',
        inventory.lootbox = '$lootbox',
        inventory.seed = '$seed',
        inventory.epic_item = '$epic_item'
    WHERE inventory.id_inventory = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateInventory);

    echo mysqli_affected_rows($conn);
}
/*?======================== Inventory function end ========================= */

/*?======================== Bank function start ========================= */
function ubahBank()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $coins = $_POST['coins'];
    $bonus = $_POST['bonus'];

    $updateBank = "UPDATE bank, player
    SET player.username = '$username',
        bank.coins = '$coins',
        bank.bonus = '$bonus'
    WHERE bank.id_bank = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateBank);

    echo mysqli_affected_rows($conn);
}
/*?======================== Bank function end ========================= */

/*?======================== Professions function start ========================= */
function ubahProfessions()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $worker = $_POST['worker'];
    $crafter = $_POST['crafter'];
    $lootboxer = $_POST['lootboxer'];
    $merchant = $_POST['merchant'];
    $enchanter = $_POST['enchanter'];

    $updateProfessions = "UPDATE professions, player
    SET player.username = '$username',
        professions.worker = '$worker',
        professions.crafter = '$crafter',
        professions.lootboxer = '$lootboxer',
        professions.merchant = '$merchant',
        professions.enchanter = '$enchanter'
    WHERE professions.id_professions = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateProfessions);

    echo mysqli_affected_rows($conn);
}
/*?======================== Professions function end ========================= */

/* ?======================== Quest function start ========================= */
function ubahQuest()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $quest = $_POST['quest'];
    $detail_quest = $_POST['detail_quest'];

    $updateQuest = "UPDATE quest, player
    SET player.username = '$username',
        quest.quest = '$quest',
        quest.detail_quest = '$detail_quest'
    WHERE quest.id_quest = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateQuest);

    echo mysqli_affected_rows($conn);
}
/*?======================== Quest function end ========================= */

/*?======================== Horse function start ========================= */
function ubahHorse()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $tier = $_POST['tier'];
    $type = $_POST['type'];
    $level = $_POST['level_horse'];
    $epicness = $_POST['epicness'];

    $updateHorse = "UPDATE horse, player
    SET player.username = '$username',
        horse.tier = '$tier',
        horse.type = '$type',
        horse.level = '$level',
        horse.epicness = '$epicness'
    WHERE horse.id_horse = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateHorse);

    echo mysqli_affected_rows($conn);
}
/*?======================== Horse function end ========================= */

/*?======================== Achievements function start ========================= */
function ubahAchievements()
{
    global $conn;

    $id = $_POST['id'];
    $username = $_POST['username'];
    $progress = $_POST['progress'];
    $dungeon = $_POST['dungeon'];
    $working = $_POST['working'];
    $multiplayer = $_POST['multiplayer'];
    $events = $_POST['events'];
    $misc = $_POST['misc'];

    $updateAchievements = "UPDATE achievements, player
    SET player.username = '$username',
        achievements.progress = '$progress',
        achievements.dungeon = '$dungeon',
        achievements.working = '$working',
        achievements.multiplayer = '$multiplayer',
        achievements.events = '$events',
        achievements.misc = '$misc'
    WHERE achievements.id_achievements = '$id'
    AND player.id_player = '$id'";

    mysqli_query($conn, $updateAchievements);

    echo mysqli_affected_rows($conn);
}
/*?======================== Achievements function end ========================= */

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $tgl_lahir = mysqli_real_escape_string($conn, $data['tgl_lahir']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $agama = mysqli_real_escape_string($conn, $data['agama']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $data['jenis_kelamin']);

    // cek username sudah ada atau belum
    $result = mysqli_query(
        $conn,
        "SELECT username FROM user WHERE username = '$username'"
    );

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['username_exist'] = true;
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        $_SESSION['salah_konfirmasi'] = true;
        return false;
    }

    // enkripsi password
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query(
        $conn,
        "INSERT INTO user VALUES('', '$username', '$passwordhash', '$tgl_lahir', '$email', '$agama', '$jenis_kelamin')"
    );
    return mysqli_affected_rows($conn);
}
