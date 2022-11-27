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
    $quest = $faker->randomElement(
        $array = [
            'Hunt Quest',
            'Adventure Quest',
            'Crafting Quest',
            'Arena Quest',
            'Gambling Quest',
            'Miniboss Quest',
            'Trading Quest',
            'Guild Quest',
            'Cooking Quest',
            '-',
        ]
    );

    // get first word from id quest
    $firstWord = explode(' ', $quest)[0];

    if ($firstWord == 'Hunt') {
        $detailquest =
            'Kill ' .
            $faker->numberBetween(1, 5) .
            ' ' .
            $faker->randomElement(
                $array = [
                    'Zombie',
                    'Cecaelia',
                    'Wolf',
                    'Scaled Kid Dragon',
                    'MUTANT WATER BOTTLE',
                    'Bee Horde',
                    'Giant',
                    'Wild Sharpener',
                ]
            );
    } elseif ($firstWord == 'Adventure') {
        $detailquest = 'Do an Adventure command';
    } elseif ($firstWord == 'Crafting') {
        $detailquest =
            'Craft ' .
            $faker->numberBetween(1, 8) .
            ' ' .
            $faker->randomElement(
                $array = [
                    'Log',
                    'Fish',
                    'Fruit',
                    'Drop-Item',
                    'Potion',
                    'Cookie',
                    'Lootbox',
                    'Seed',
                    'Epic Item',
                ]
            );
    } elseif ($firstWord == 'Arena') {
        $detailquest = 'Join an Arena';
    } elseif ($firstWord == 'Gambling') {
        $detailquest =
            'Get at least ' .
            $faker->numberBetween(1000, 250000) .
            ' coins with gambling commands';
    } elseif ($firstWord == 'Miniboss') {
        $detailquest = 'Summon and kill a miniboss';
    } elseif ($firstWord == 'Trading') {
        $detailquest = 'Do a trade with the EPIC NPC';
    } elseif ($firstWord == 'Guild') {
        $detailquest = 'Do a guild raid';
    } elseif ($firstWord == 'Cooking') {
        $detailquest =
            'Cook ' .
            $faker->numberBetween(1, 5) .
            ' ' .
            $faker->randomElement(
                $array = [
                    'Baked Fish',
                    'Coin Sandwich',
                    'Hairn',
                    'Fruit Salad',
                    'Apple Juice',
                    'Carrot Bread',
                    'Orange Juice',
                    'Banana Pickaxe',
                    'Heavy Apple',
                    'Filled Lootbox',
                    'Fruit Ice Cream',
                    'Coin Sandwich',
                ]
            );
    } else {
        $detailquest = '-';
    }

    // $sql = "INSERT INTO quest (id_quest, quest, detail_quest) VALUES ('', '$quest', '$detailquest')";

    // mysqli_query($conn, $sql);

    // mysqli_affected_rows($conn);

    echo $i . ' data berhasil ditambahkan';
    echo '<ul>';
    echo '<li>' . $no++ . '</li>';
    echo '<li class="quest" id="quest">' . $quest . '</li>';
    echo '<li>' . $detailquest . '</li>';
    echo '</ul>';
}
?>

        <!--? jQuery CDN -->
        <script src="../../assets/js/jquery-3.6.1.min.js"></script>
