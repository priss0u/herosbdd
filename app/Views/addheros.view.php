<?php
    require_once (__DIR__ . '/partials/head.php');
?>
<h1>Création de HEROS</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="name" class="form-label">Nom de ton HERO:</label>
            <input type="text" name="name" id="name" placeholder="Samsam !" class="form-control">
            <?php 
            if(isset($arrayError['name'])){
                ?>
                    <p class="text-danger"><?= $arrayError['name']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="power" class="form-label">Le pouvoir de ton HERO:</label>
            <input type="text" name="power" id="power" placeholder="Ses mouvements son si lent qu'il devient presque imperceptible" class="form-control">
            <?php 
            if(isset($arrayError['power'])){
                ?>
                    <p class="text-danger"><?= $arrayError['power']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Parle moi de ton HERO:</label>
            <textarea class="form-control" placeholder="Le plus petit des grands héros !" id="description" name="description" style="height: 100px"></textarea>
            <?php 
            if(isset($arrayError['description'])){
                ?>
                    <p class="text-danger"><?= $arrayError['description']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Nom de l'image :</label>
            <input type="text" name="image" id="" class="form-control">
            <?php 
            if(isset($arrayError['image'])){
                ?>
                    <p class="text-danger"><?= $arrayError['image']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" class="btn btn-success mt-5">Création du HERO !</button>
    </div>
</form>
<?php
    require_once (__DIR__ . '/partials/footer.php');