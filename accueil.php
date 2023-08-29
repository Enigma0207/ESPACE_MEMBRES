<?php  session_start() ;// mettre avant la html cest pour demarer une session, fait la liaison avec toutes les session

if(!isset($_SESSION['id'])){// silya pas de session active
    header("Location: connexion.php");// rediriger vers le formulaire
}
?>

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
    <?php include_once "nav.php"; ?>

</body>
</html>