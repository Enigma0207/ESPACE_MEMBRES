<?php

function dbconnexion (){

    $connexionDb =null;
    try {
        $connexionDb = new PDO("mysql:host=localhost;dbname=cours_db","root","");
    } catch (PDEOExeption $e) {
          $connexionDb = $e;
    }
    return  $connexionDb;
}




?>