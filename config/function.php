<?php 
    function redirectToRoute($route){
        header("Location: {$route}");
        exit;
    }

    function successMessage($myMessage){

        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $myMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

    }

    function errorMessage($myMessage){

        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $myMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

    }