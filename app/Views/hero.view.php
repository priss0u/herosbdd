<?php 
require_once(__DIR__ . '/partials/head.php');
?>
    <div class="container">
        <h1><?= $hero['name'] ?></h1>
        <div class="row">
            <div class="col">
                <img src="public/img/<?= $hero['image']?>" alt="Image de <?= $hero['name']?>">
            </div>
            <div class="col">
                <h2>Pouvoir magique :</h2>
                <p><?= $hero['magic_power']?></p>
            </div>
            <div class="col">
                <h2>Description :</h2>
                <p><?= $hero['description'] ?></p>
            </div>
        </div>
    </div>
<?php 
require_once(__DIR__ . '/partials/footer.php');
?>