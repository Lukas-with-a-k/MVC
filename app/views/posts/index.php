<?php require APPROOT . '/views/bases/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <?php if(!empty($_SESSION['flashAdd'])){
                flash('flashAdd');
    } ?>
    <?php if(!empty($_SESSION['flashFailure'])){
                flash('flashFailure');
    } ?>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Ajouter un post
      </a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <!-- ici on affiche avec la syntaxe des objets en PHP car dans la requete on spécifie PDO::FETCH_OBJ -->
      <h4 class="card-title"><?= htmlspecialchars($post->title) ?></h4>
      <div class="bg-light p-2 mb-3">
        Publié par <?= htmlspecialchars($post->nom) ?> le <?= $post->dateCreated; ?>
      </div>
      <?php $allowed_tags = '<p><b><i><strong><em><span><ul><ol><li><br><hr>';?>
      <p class="card-text"><?= strip_tags(htmlspecialchars_decode($post->content), $allowed_tags)  ?></p>

       <!-- redirection à faire sur la structure du router : controlerName/methodName/params -->
      <a href="<?php echo URLROOT; ?>/posts/details/<?php echo $post->postId; ?>" class="btn btn-dark">Voir plus</a>
    </div>
  <?php endforeach; ?>
  <div class="pagination">
    <?php if ($data['currentPage'] > 1): ?>
        <a href="?page=<?= $data['currentPage'] - 1 ?>" class="btn btn-light">Précédent</a>
    <?php endif; ?>
    <a href="?page=<?= $data['currentPage'] + 1 ?>" class="btn btn-light">Suivant</a>
</div>

<?php require APPROOT . '/views/bases/footer.php'; ?>
