<!-- on cree une fonction getPost pour recuperer la liste des posts cas des publication -->

<?php
require_once ("action.php");
function getPost (){
  $lesposts=null;
    $dbconnect = dbconnexion();//connexion a la bdd
    // preparer la requete
    $request = $dbconnect->prepare("SELECT id_post, likes, membre_id, text, photo, id_membres, pseudo FROM posts, membres WHERE posts.membre_id = membres.id_membres");
    // $request = $dbconnect->prepare("SELECT id_post,likes,membre_id,text,photo FROM post WHERE membre_id IN (SELECT * FROM membres");

    // execution de la requete

    try{//marque le début du bloc d'essai, où le code potentiellement problématique est placé. 
        $request->execute();
        //transformer le resultat de la requet dans un tableau avk tetch all cad tous les element du tableau posts
        $lesposts =$request->fetchAll();
    } catch(PDOException $e){//indique que le code dans ce bloc sera exécuté si une exception de type PDOException est attrapée. $e est la variable qui contient l'objet exception qui a été attrapé.
      $lesposts= $e->getMessage();
    }
    return $lesposts;

    
}
?>