<?php require APPROOT . '/views/bases/header.php'; ?>

<div class="container mt-5">
    <h2>S'inscrire</h2>
    <form method="POST" action="<?php echo URLROOT ?>/users/register">
        <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" class="form-control" >
            <?php if(!empty($_SESSION['flashName'])){
                echo $_SESSION['flashName'];
            } ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" >
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <label>Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
<?php require APPROOT . '/views/bases/footer.php'; ?>