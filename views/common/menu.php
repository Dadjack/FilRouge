<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URL; ?>home">Accueil</a>
        </li>
        <!--<> ON VERIFIE SI L'UTILISATEUR EST CONNECTE POUR L'AFFICHAGE DES PAGES <>--->
        <?php if(!Security::isConnect()) : ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>furnitures">Meubles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>drawings">Dessins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>peebles">Galets</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>login">Se connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>createAccount">Créer un compte</a>
          </li>
        <?php else : ?>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>account/profile">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>furnitures">Meubles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>drawings">Dessins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>peebles">Galets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>account/disconnection">Se déconnecter</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>account/contact">Contact</a>
          </li> -->
        <?php endif; ?>
        <!--<> ON VERIFIE SI L'UTILISATEUR EST ADMINISTRATEUR POUR LA CONDITION DU MENU <>--->
        <?php if(Security::isConnect() && Security::isAdministrator()) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administration
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= URL; ?>administration/rights">Gérer les droits</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php if(isset($_SESSION['cart'])) : ?>
  <?php $nbr = count($_SESSION['cart']); ?>
    <div class="cart">
      <a  aria-current="page" href="<?= URL; ?>cart/showCart"><img src="<?= URL; ?>public/images/cart1.png" width="60" alt="logo du site"/></a>
    </div>
    <div>
      <?= $nbr;?>
    </div>
<?php endif; ?>