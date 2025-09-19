<?php 
require_once(__DIR__ . '/partials/head.php');
?>
 <h1>Les heros les plus fun et mignon !</h1>
    <div class="container-fluid my-5">
        <div class="row justify-content-between">
            <?php
            if($heros){
                foreach($heros as $value){

                    ?>
                        <div style="width: 18rem;">
                            <img class="card-img-top" src="public/img/<?= $value['image'] ?>" alt="Image de <?php echo $value['name'] ?>">
                            <h2><?= $value['name']?></h2>
                            <a href="/hero?id=<?= $value['id']?>" class="btn btn-info d-flex justify-content-center">Voir +</a>
                        </div>
                    <?php
                }
            }else{
                echo "<p>Aucun personnage disponible, ils sont tous en mission.</p>";
            }   
            ?>
        </div>
        
    </div>

<?php 
require_once(__DIR__ . '/partials/footer.php');
?>