<header>
  <h1>La Maison</h1>
  <nav class="container">
    <ul>
    </ul>
    <ul>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn active"><i class="fas fa-user"></i><span> <?= $_SESSION['prenom'] ?></span></a>
        <div class="dropdown-content mobile">
          <a href="Accueil"><i class="fas fa-home"></i><span> Accueil</span></a>
          <a href="Admin"><i class="fas fa-tachometer-alt"></i><span> Panel admin</span></a>
          <a href="Deconnexion"><i class="fas fa-times"></i><span> Déconnexion</span></a>
        </div>
      </li>
    </ul>
  </nav>
</header>