<?php
require '../vendor/autoload.php';
require '../php/functions.php';

$faker = new Faker\Generator();
$faker->addProvider(new Faker\Provider\id_ID\Profile($faker));
$faker->addProvider(new Faker\Provider\id_ID\User($faker));

// $faker->addProvider(new Faker\Provider\id_ID\Profile($faker));
// $faker->addProvider(new Faker\Provider\id_ID\User($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Bank($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Inventory($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Horse($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Achievements($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Quest($faker));
// $faker->addProvider(new Faker\Provider\id_ID\Professions($faker));
$no = 0;
$id_profile = 0;
$id_inventory = 0;
$id_bank = 0;
$id_horse = 0;
$id_achievements = 0;
$id_quest = 0;
$id_professions = 0;
for ($i = 1; $i <= 55; $i++) {
    $no++;
    $username = $faker->username;
    $id_profile++;
    $id_inventory++;
    $id_bank++;
    $id_horse++;
    $id_achievements++;
    $id_quest++;
    $id_professions++;

    // $sql = "INSERT INTO player (id_player, username, id_profile, id_inventory, id_bank, id_horse, id_achievements, id_quest, id_professions) VALUES ('', '$username', '$id_profile', '$id_inventory', '$id_bank', '$id_horse', '$id_achievements', '$id_quest', '$id_professions')";

    $sql = "UPDATE player SET id_profile = '$id_profile',
    username = '$username' WHERE id_player = '$no'";

    mysqli_query($conn, $sql);

    mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>' . $no . '</li>';
    echo '<li>' . $username . '</li>';
    // echo '<li>' . $id_profile . '</li>';
    // echo '<li>' . $id_inventory . '</li>';
    // echo '<li>' . $id_bank . '</li>';
    // echo '<li>' . $id_horse . '</li>';
    // echo '<li>' . $id_achievements . '</li>';
    // echo '<li>' . $id_quest . '</li>';
    // echo '<li>' . $id_professions . '</li>';
    echo '</ul>';
}

?>
