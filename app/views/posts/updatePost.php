<?php require APPROOT . '/views/bases/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
<div class="card card-body bg-light mt-5">
    <h2>Modifier un Post</h2>
    <form action="<?php echo URLROOT; ?>/posts/update/<?=$data['post']->id?>" method="post">
        <div class="form-group">
            <label for="title">Titre: <sup></sup></label>
            <input type="text" name="title" class="form-control form-control-lg" value="<?= strip_tags($data['post']->title) ?>">
            <?php if(!empty($_SESSION['flashTitle'])){
                flash('flashTitle');
            } ?>
        </div>
        <div class="form-group">
            <label for="body">Contenu: <sup></sup></label>
            <textarea name="body" id="body" class="form-control form-control-lg"><?= strip_tags($data['post']->content) ?></textarea>
            <?php if(!empty($_SESSION['flashBody'])){
                flash('flashBody');
            } ?>
            <?php if(!empty($_SESSION['flashFail'])){
                flash('flashFail');
            } ?>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/bases/footer.php'; ?>