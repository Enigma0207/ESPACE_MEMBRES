<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php 'include_once "nav.php"'; ?>
    <header>

    </header>
    <main>
        <div class="container">
            <form action="traitement.php" method="POST" enctype="multipart/form-data">
  
                 <div class="banner">
                   <p>
                      <marquee behavior="scroll" direction="left">
                       salut LILI ET GUANAYA.
                      </marquee>
                    </p>
                 </div>
                 <label for="email"></label>
                 <input type="email" name="email"  placeholder="email"><br><br>
         
                 <label for="pseudo"></label>
                 <input type="text" name="pseudo" required placeholder="pseudo"><br><br>
         
                 <label for="motdepasse"></label>
                 <input type="password" name="motdepasse" placeholder="password"><br><br>
         
                 <label for="confirmermotdepasse"></label>
                 <input type="password" name="confirmermotdepasse" required placeholder="confirmerpassword"><br><br>
         
                 <label for="fichier"></label>
                 <input type="file" name="image" class="fichier" ><br><br>
         
                 <button type="submit" name="valider" class="valider">inscription</button>
            </form>
      </div>
    </main>
    <footer>

    </footer>
      

</body>

</html>