<?php 
require_once(__DIR__ . '/partials/head.php');
?>
<h1 class = "text-center">Formulaire d'inscription</h1>

<div class = "container ">
    <form action="" method = "">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3 form-check">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="pseudo" class="form-control" id="exampleInputpseudo" aria-describedby="pseudo">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
require_once(__DIR__ . '/partials/footer.php');
?>

