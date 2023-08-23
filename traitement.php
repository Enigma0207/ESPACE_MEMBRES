<?php

require_once ("action.php");
if(isset($_POST["valider"])){// pour inscription

    $email = htmlspecialchars($_POST["email"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mtdepasse = htmlspecialchars($_POST["motdepasse"]);
    $confirmermotdepasse = htmlspecialchars($_POST["confirmermotdepasse"]);
    $mtdepasseCript = password_hash ($mtdepasse, PASSWORD_DEFAULT);

    //si on veut voir le nom de notre image
    echo "<pre>";

    print_r($_FILES);

    echo "<pre>";


    // traitement de l'image

    $img_name=$_FILES['image']['name'];// on stock dans   $img_name image et son nom

    $img_tmp=$_FILES['image']['tmp_name'];// stock la destination temporaire de l'image dans le server  


    // dans htdox: dans le projet dans dossier image : prendre :'\ESPACE_MEMBRES\img'+le nom de 'image
    $destination = $_SERVER['DOCUMENT_ROOT'].'/ESPACE_MEMBRES/img/'.$img_name;

    move_uploaded_file($img_tmp,$destination);//une fonction qui enregistre l'image dans le dossier img

    //il faut etablir la connexion

    $db= dbconnexion();

    // faire une requete
     $request =  $db->prepare("INSERT INTO membres(email, pseudo, mdp, profil_img) VALUES(?, ?, ?, ?)");

    try {// essayer d'enregistrer les info dans la table utilisateur
      $request->execute(array($email, $pseudo, $mtdepasseCript, $img_name));
    } catch (PDOExeption $e) {
        echo $e->getMessage();//afficher l'erreur sql genere
    }

}


// LA CONNEXION

if(isset($_POST['connexion'])){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['motdepasse'];


     // Se connecter à la base de données :

 

    $db = dBConnexion();

 

    // Préparation de la requête :

 

    $request = $db->prepare("SELECT * FROM membres WHERE pseudo = ?");

    // Execution de la requête

 

    try {

        $request->execute([$pseudo]);

        $user = $request->fetch();

    } catch (PDOException $error) {

        echo $error->getMessage();

    }

 

    if (empty($utilisateur)) {

        echo "Pseudo inconnu";

        // header('refresh: 2; http://localhost/espace_membre/connexion.php');

    } else {

        if (password_verify(($mdp, $utilisateur["mdp"])) {

           // creer les variable de session
           $_SESSION ["pseudo"] = $utilisateur["pseudo"];
           $_SESSION ["pseudo"] = $utilisateur["pseudo"];
           $_SESSION ["img"] = $utilisateur["profil_img"];

           header("Location:accueil.php");

        } else {

            echo "Mot de passe incorrect";

            // header('refresh: 2; http://localhost/espace_membre/connexion.php');

        }

    }
}

?>