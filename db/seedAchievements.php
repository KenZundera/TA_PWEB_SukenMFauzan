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
$no = 1;
for ($i = 1; $i <= 50; $i++) {
    $no++;
    $progress = $faker->numberBetween(1, 82);

    $dungeon = $faker->numberBetween(1, 35);

    $working = $faker->numberBetween(1, 43);

    $multiplayer = $faker->numberBetween(1, 33);

    $events = $faker->numberBetween(1, 43);

    $misc = $faker->numberBetween(1, 48);

    // $sql = "INSERT INTO achievements (id_achievements, progress, dungeon, working, multiplayer, events, misc) VALUES ('', '$progress', '$dungeon', '$working', '$multiplayer', '$events', '$misc')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>Progress: ' . $progress . '</li>';
    echo '<li>Dungeon: ' . $dungeon . '</li>';
    echo '<li>Working: ' . $working . '</li>';
    echo '<li>Multiplayer: ' . $multiplayer . '</li>';
    echo '<li>Events: ' . $events . '</li>';
    echo '<li>Misc: ' . $misc . '</li>';
    echo '</ul>';
}

?>
