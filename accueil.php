<?php  session_start() ;// mettre avant la html cest pour demarer une session, fait la liaison avec toutes les session
require_once 'fonction1.php';
if(!isset($_SESSION['id'])){// silya pas de session active
    header("Location: connexion.php");// rediriger vers le formulaire
}

$listPost = getPost();//récuperer la list de get post
//  echo"pre";
//  print_r($listPost);
//  echo "pre";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"; ?>
       <div class="container">
           <?php foreach($listPost as $post){?>

               <div class="postimg">
                  <img src="img/<?= $post['photo']; ?>" alt="image">
               </div>

               <p><?= $post["text"]; ?></p>

               <span><?= $post["likes"]; ?></span>
               <!-- <button><i class="fa-regular fa-thumbs-up"></i></button> dans la formulaire ou une balise a là cest sans formulaire-->
               <!-- lorsque ilya un point d'interrogation, cest un paramettre d'url -->
               <a href="traitement.php?idpost=<?= $post['id_post']; ?>">
                  <i class="fa-sharp fa-solid fa-heart fa-beat"></i>
               </a>
              
            <?php }?>
       </div>

</body>
</html>