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
    $worker = $faker->numberBetween(1, 150);
    $crafter = $faker->numberBetween(1, 150);
    $lootboxer = $faker->numberBetween(1, 150);
    $merchant = $faker->numberBetween(1, 150);
    $enchanter = $faker->numberBetween(1, 150);

    // $sql = "INSERT INTO professions (id_professions, worker, crafter, lootboxer, merchant, enchanter) VALUES ('', '$worker', '$crafter', '$lootboxer', '$merchant', '$enchanter')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>Worker: ' . $worker . '</li>';
    echo '<li>Crafter: ' . $crafter . '</li>';
    echo '<li>Lootboxer: ' . $lootboxer . '</li>';
    echo '<li>Merchant: ' . $merchant . '</li>';
    echo '<li>Enchanter: ' . $enchanter . '</li>';
    echo '</ul>';
}

?>
