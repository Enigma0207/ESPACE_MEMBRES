<?php
session_start();
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

 

    $connexion = dbconnexion();

 

    // Préparation de la requête :

 

    $connexionRequest = $connexion->prepare("SELECT * FROM membres WHERE pseudo = ?");
    $connexionRequest->execute(array($pseudo));
    $utilisateur =$connexionRequest->fetch(PDO::FETCH_ASSOC);

    // Execution de la requête

 

    // try {

    //     $request->execute([$pseudo]);

    //     $user = $request->fetch();

    // } catch (PDOException $error) {

    //     echo $error->getMessage();

    // }

 
    if (empty($utilisateur)) {

        // echo "Pseudo inconnu";
         $_SESSION["error"] = "utilisateur inconnu"; //ici cest juste quand le pseudo est incorrect dans inscription
         // et rester sur la meme page connexion
         header("Location:connexion.php");

        // header('refresh: 2; http://localhost/espace_membre/connexion.php');

    } else {
        //on verifie de mot de passe, la fonctopnpassword_verify prebds 2 param:ce que utilisateur a tapé et ce qui se trouve das la base des données

      if (password_verify($mdp, $utilisateur["mdp"])){
    // la variable $_SESSION est un tableau .
    // toute  toute supeurglobal est un tableau en php ex $_post
           // creer les variable de session
           $_SESSION["id"] = $utilisateur["id_membres"];
           $_SESSION["pseudo"] = $utilisateur["pseudo"];
           $_SESSION["img"] = $utilisateur["profil_img"];
           // $_SESSION = [
           // 'id' => 1,
           // "pseudo" => "WassilaDors",
           // "img" => "sommeil-enfant-dormir.jpg"
           // ];


        //    on va aller 
           header("Location:accueil.php");

        } else {

            echo "Mot de passe incorrect";

            // header('refresh: 2; http://localhost/espace_membre/connexion.php');

        }

    }
}

// PUBLICATION 

if(isset($_POST["publier"])){

    $message = htmlspecialchars($_POST["message"]);

     $img_name=$_FILES['img']['name'];
     $tmp= $_FILES['img']['tmp_name'];

     $destination = $_SERVER['DOCUMENT_ROOT'].'/ESPACE_MEMBRES/img/'.$img_name;

     move_uploaded_file($tmp,   $destination );

     // CONNEXION A LA BDD

     $dbconnect =  dbconnexion();
    //  preparation de la requete
   $request = $dbconnect->prepare("INSERT INTO posts (membre_id, photo, text) VALUES (?,?,?)");

//    execution de la requete

try{
    $request->execute(array($_SESSION['id'] ,  $img_name, $message)); 

 }catch(PDOExeption $e){
     echo $e->getMessage();
 }
}

?>