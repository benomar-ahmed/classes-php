<nav>
    <ul>

        <?php if(isset($_SESSION['login']) == true) : ?>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="deconnexion.php">Deconnexion</a></li>
        <?php else :?>
        <li><a href='inscription.php'>Inscription</a></li>
        <li><a href='connexion.php'>Connexion</a></li>
        <?php endif ?>

    </ul>
</nav>
