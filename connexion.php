  <?php session_start ();// faire appl a la fonction session dans traitement

  ?>

<!-- ON VA COPIER VALIDER MOTDEPASSE ET PSEUDO du formulaire pour le mettre dans IC -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
        <div class="connecting">
            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                <?php 
                  if(isset($_SESSION['error'])){ ?>
                    <p><?= $_SESSION['error']; ?></p>
                
                  <?php } ?>
  
                <label for="pseudo"></label>
                 <input type="text" name="pseudo" required placeholder="pseudo"><br><br>
         
                 <label for="motdepasse"></label>
                 <input type="password" name="motdepasse" placeholder="password"><br><br>
         
                <button type="submit" name="connexion" class="valider">connexion</button>
               
            </form>
      </div>
</body>
</html>

 