
<?php

if (isset($_SESSION['id'])){ ?>

<nav>
    
    <a href="post.php">publier</a>
    <!-- in veut juste avoir le nom de l'utilisateur qui se connectedevant l'image -->
    <p class = "bienvenue">  
        <?php echo "bienvenue". " ". $_SESSION["pseudo"] ?>
    </p>
    <img src="img/<?php echo  $_SESSION["img"] ; ?>" alt="profil">
    <!-- on met le bouton dans form pour cliquer sur le boutonapres il faut faire session destoy dans la ligne 23 -->
    <form method="post" class='formeNav'>
        <button class='logout' name='logout'>Deconnexion</button>
    </form>
    
</nav>



<?php } else{?>
   <nav>
       <button><a href="connexion.php">Connexion</a></button>   
   </nav>
<?php } ?>

<?php
// pour tuer toutes les session cad tableau vider le tableau $_SESSION,
if (isset($_POST['logout'])) {
    session_destroy();
    //pour eviter de se deconnecter à deux reprise
    echo "<script> location.href='connexion.php'</script>";


}

?>