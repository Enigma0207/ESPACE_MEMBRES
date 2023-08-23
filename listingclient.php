<?php
// require_once("action.php");
// $db = dbconnexion();
// PREPARERATION DE LA REQUETE
$request = $db->prepare("SELECT * FROM membres");
// //éxécuter la requete
// try {
//     $request->execute();
//     $users = $request->fetchAll();
// } catch (PDOExepetion $e) {
//     $e->getMessage();
// }


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    <!-- <table>
        <thead>
            <tr>
                <th>email</th>
                <th>pseudo</th>
                <th>email</th>
                <th>motdepasse</th>

            </tr>
        </thead>
        <tbody> -->
            <!-- afficher les info des utilisateurs dans tableau depuis la base des donnée avec la boucle foreach -->

            <?php foreach($users as $u){?>

                <!-- <tr>
                    < par rapport aux données telque inscrites dans la bdd -->
                    <!-- <td><?= $u['email']?></td>
                    <td><?= $u['pseudo']?></td>
                    <td><?= $u['email']?></td>
                    <td><?= $u['mdp']?></td>
                </tr>
                </tr>  -->

            <?php }?>
        <!-- </tbody>
    </table>
</body>
</html> -->