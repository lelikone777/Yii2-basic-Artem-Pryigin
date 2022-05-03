<?php
session_start();

require_once 'db/db.php';
$products = $connect->query("SELECT * FROM products")
        ->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($products);
//echo '</pre>';

$cats = $connect->query("SELECT cat FROM cats")
    ->fetchAll(PDO::FETCH_ASSOC);

$weights = $connect->query("SELECT weight FROM weights")
    ->fetchAll(PDO::FETCH_ASSOC);

$colors = $connect->query("SELECT color FROM colors")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajax</title>


</head>
<body>
        <div class="container">

            <div class="select">
                <select name="cat" id="cat">
                    <option value="all">Все категории</option>
                    <? foreach ($cats as $cat) { ?>
                        <option value="<?= $cat['cat'] ?>"><?= $cat['cat'] ?></option>
                    <? } ?>
                </select>
                <select name="color" id="color">
                    <option value="all">Все Цвета</option>
                    <? foreach ($colors as $color) { ?>
                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                    <? } ?>
                </select>
                <select name="weight" id="weight">
                    <option value="all">Любой вес</option>
                    <? foreach ($weights as $weight) { ?>
                        <option value="<?= $weight['weight'] ?>"><?= $weight['weight'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="row">

                <?php foreach ($products as $product) { ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-title"><?= $product['cat']?> <?= $product['title']?></div>
                        <div class="card-body">
                            <p class="lead">Цвет: <?= $product['color']?></p>
                            <p class="lead">Вес: <?= $product['weight']?></p>
                        </div>
                    </div>
                </div>
                <? } ?>

            </div>
        </div>
        <script src="js/jquery-3.6.0.min.js" ></script>
        <script src="js/ajax.js"></script>
</body>
</html>
