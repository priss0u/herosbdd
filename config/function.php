<?php 
    function redirectToRoute($route){
        http_response_code(308);
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