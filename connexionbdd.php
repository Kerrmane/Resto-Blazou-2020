
<?php 
$servername = 'localhost';
 $username = 'root';
 $password = 'root'; 
 try {
    $bdd = new PDO("mysql:host=$servername;dbname=RestoBlazou", $username, $password);
 //On définit le mode d'erreur de PDO sur Exception
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(Exception $e) {
     $e->getMessage();
 }
 ?>