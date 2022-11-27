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
    $log = $faker->numberBetween(1, 100000);
    $fish = $faker->numberBetween(1, 100000);
    $fruit = $faker->numberBetween(1, 1000);
    $drop_item = $faker->numberBetween(1, 100);
    $potion = $faker->numberBetween(1, 100000);
    $cookie = $faker->numberBetween(1, 100000);
    $lootbox = $faker->numberBetween(1, 1000);
    $seed = $faker->numberBetween(1, 10000);
    $epic_item = $faker->numberBetween(1, 100);

    // $sql = "INSERT INTO inventory(id_inventory, log, fish, fruit, drop_item, potion, cookie, lootbox, seed, epic_item) VALUES ('', '$log', '$fish', '$fruit', '$drop_item', '$potion', '$cookie', '$lootbox', '$seed', '$epic_item')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>Log: ' . $log . '</li>';
    echo '<li>Fish: ' . $fish . '</li>';
    echo '<li>Fruit: ' . $fruit . '</li>';
    echo '<li>Drop Item: ' . $drop_item . '</li>';
    echo '<li>Potion: ' . $potion . '</li>';
    echo '<li>Cookie: ' . $cookie . '</li>';
    echo '<li>Lootbox: ' . $lootbox . '</li>';
    echo '<li>Seed: ' . $seed . '</li>';
    echo '<li>Epic Item: ' . $epic_item . '</li>';
    echo '</ul>';
}

?>
