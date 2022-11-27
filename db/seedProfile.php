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
    $username = $faker->username;
    $level = $faker->numberBetween(1, 6600);
    $atk = $faker->numberBetween(1, 1000);
    $def = $faker->numberBetween(1, 1000);
    $hp = $faker->numberBetween(100, 10000);
    $sword = $faker->sword;
    $armor = $faker->armor;

    // $sql = "INSERT INTO profile (id_profile, level, atk, def, hp, sword, armor) VALUES ('', '$level', '$atk', '$def', '$hp', '$sword', '$armor')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>Level: ' . $level . '</li>';
    echo '<li>Attack: ' . $atk . '</li>';
    echo '<li>Defense: ' . $def . '</li>';
    echo '<li>HP: ' . $hp . '</li>';
    echo '<li>Sword: ' . $sword . '</li>';
    echo '<li>Armor: ' . $armor . '</li>';
    echo '</ul>';
}

?>
