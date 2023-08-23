<!-- ON VA COPIER VALIDER MOTDEPASSE ET PSEUDO du formulaire pour le mettre dans IC -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"?> 

    <form action="traitement.php" method="POST" enctype="multipart/form-data">
  
                <label for="pseudo"></label>
                 <input type="text" name="pseudo" required placeholder="pseudo"><br><br>
         
                 <label for="motdepasse"></label>
                 <input type="password" name="motdepasse" placeholder="password"><br><br>
         
                <button type="submit" name="connexion" class="valider">inscription</button>
               
            </form>
      </div>
</body>
</html>

 