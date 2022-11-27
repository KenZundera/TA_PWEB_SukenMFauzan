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
    $coins = $faker->numberBetween(1, 100);

    $format = $faker->randomElement($array = ['K', 'M', 'B', 'T']);

    $bonus = $faker->randomFloat(1, 1, 10);

    // $sql = "INSERT INTO bank (id_bank, coins, bonus) VALUES ('', '$coins $format', '$bonus%')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>' . $no++ . '</li>';
    echo '<li>' . $coins . $format . '</li>';
    echo '<li>' . $bonus . '% </li>';
    echo '</ul>';
}

?>
