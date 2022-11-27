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
    $tier = $faker->numberBetween(1, 10);
    $type = $faker->randomElement(
        $array = [
            'Defender',
            'Strong',
            'Tank',
            'Golden',
            'Magic',
            'Festive',
            'Special',
            'Super Special',
        ]
    );
    $level = $faker->numberBetween(1, 100);
    $epicness = $faker->numberBetween(1, 50);

    // $sql = "INSERT INTO horse (id_horse, tier, type, level, epicness) VALUES ('', '$tier', '$type', '$level', '$epicness')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    // echo '<ul>';
    // echo '<li>' . $no++ . '</li>';
    // echo '<li>' . $tier . '</li>';
    // echo '<li>' . $type . '</li>';
    // echo '<li>' . $level . '</li>';
    // echo '<li>' . $epicness . '</li>';
    // echo '</ul>';
}
?>

