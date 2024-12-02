<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    

      <div class="navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">A propos</a>
          </li>
<?php if(isLoggedIn()){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index">Les posts</a>
          </li>
<?php } ?>
        </ul>
        
        <ul class="navbar-nav ms-auto">
<?php if(isLoggedIn()){ ?>
          <li class="nav-item">
              <a class="nav-link" href="#">Bienvenue <?= $_SESSION['username'] ?></a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Déconnexion</a>
            </li>
<?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Connexion</a>
            </li>
<?php } ?>
        </ul>
      </div>
    </div>
  </nav>