
<?php
session_start();
require('commandes.php');
require('connexionbdd.php');

//formulaire  de ajouter une article
if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['src']) && isset($_POST['description']) )
    {
        if(!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['src']) && !empty($_POST['description']) )
        {
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            
            $prix=(int)$prix;
            $src = $_POST['src'];
            $description = $_POST['description'];

            try {
                ajouter($nom,$prix,$src ,$description);
                header('Location: admin.php');
            }
           catch(Exception $e) {
            $e->getMessage();
           }
            
            
        }
    }

}
if (isset($_POST['deconnexion']))
{
  session_destroy();
  header("Location: index.php");
}

 ?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style2.css">
       

    
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
    </head>

    <body>
    <header>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="./assets/icons/fork-and-knife.svg" alt="logo">
                        RESTO Blazou
                    </div>
                    <!-- <ul class="navbar">
                        <li><a href="index.php">Acueil</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#cta">Reservaton</a></li>
                        <li><a href="contact.php">Nous contacter</a></li> -->
                        <?php
                        if ((isset($_SESSION['nomUtil']))&&(isset($_SESSION['mdp']))){
                        ?>
        <form method="POST" id="deconnexion" style="text-align:center">
        <button name="deconnexion" class="submit" style="width: 50%;"><?php if ((isset($_SESSION['nomUtil'])) && (isset($_SESSION['mdp']))) echo "Deconnexion";else echo "Connexion";?></a></li>
         </form>

         <?php
    }
                       ?>
                        
                    <!-- </ul> -->
                </nav>
             </div>
        </header>
        <?php 
            //echo "nom= ".$_SESSION['nomUtil'];
            //echo "mdp= ".$_SESSION['mdp'];
            if ((isset($_SESSION['nomUtil'])) && (isset($_SESSION['mdp'])))
            
            {
                

        ?>
        <h1 style="text-align: center"> Bienvenue <?php if ((isset($_SESSION['nomUtil'])) && (isset($_SESSION['mdp']))) echo $_SESSION['nomUtil'];?> </h1>
    <form action="" method="POST" style="width: 50%; margin:auto">
    <br>
    
        
        <div style="width: 100%;
            padding: 30px 20px;
            margin: auto;
            background-color:#82818a1a;
            display: inline-block;
            border: 2px solid #fff;
            box-sizing: border-box;">
            <h2>ajouter des menu</h2>
        <label>Nom:</label><br>
		<input type="text" name="nom" placeholder="Le nom de produit"><br>
        
        
        
        <label>prix:</label><br>
		<input type="number" name="prix" placeholder="Etrer le prix de produit"><br>
        
        
        <label>image:</label><br>
		<input type="text" name="src" placeholder="Entrer la source d'image et le lien"><br>
        
        
        <label>Description :</label><br>
		<input type="text" name="description" placeholder="Entrer la description"><br>
        
        <br>
        <button type="submit" class="btn btn-primary" name="valider" >Ajouter le menu</button>
        </div>
        </div>
  
  
  
    </form>
    <br>
    <div>
   
        <form action="" method="POST" style="width: 50%; margin:auto">
        <div style="width: 100%;
            padding: 30px 20px;
            margin: auto;
            background-color:#82818a1a;
            display: inline-block;
            border: 2px solid #fff;
            box-sizing: border-box;">
            <h2>supprimer un menu </h2>
            <label for="">identifiant du menu: </label>
            <br>
            <input type="number" name="idproduit" required placeholder="example :33">
            <button type="submit" name="valider" class="btn btn-primary">supprimer le menu</button>
        </div>
        </form>
        <?php 
        
        if(isset($_POST['valider']))
        {
            if(isset($_POST['idproduit']))
            {
                if(!empty($_POST['idproduit']))
                {
                    $idproduit=$_POST['idproduit'];
                    $idproduit=(int)$idproduit;
                    
                    try {
                        supprimer($idproduit);

                    }
                    catch(Exception $e)
                    {
                    $e->getMessage();
                    
                }
                }
            }
        }
        
        ?>
    </div>
    <div>
    <h3> Tableau de reservation</h3>
    <br>
    <table>
    <?php 
    $reponse = $bdd->query('SELECT * FROM reservation');
  
    // On affiche le resultat
    echo "<tr>";
        echo " 
        <th>id</th>
        <th>date</th>
        <th>heure</th>
        <th>personnes</th>
        <th>nom</th>
        <th>mail</th>
        ";
    while ($donnees = $reponse->fetch())
    {
        //On affiche les données dans le tableau
        
        echo "</tr>";
        echo "<tr>";
        echo "<td> $donnees[id_rsv] </td>";
        echo "<td> $donnees[date] </td>";
        echo "<td> $donnees[heure] </td>";
        echo "<td> $donnees[personnes] </td>";
        echo "<td> $donnees[nom] </td>";
        echo "<td> $donnees[mail] </td>";
        echo "</tr>";
     
         
    }
    $reponse->closeCursor();
    
    ?>
    </table>
    <br>

    </div>
    <div>
    <h3> Tableau de contact :</h3>
    <br>
    <table>
    <?php 
    $reponse = $bdd->query('SELECT * FROM contacte');
  
    // On affiche le resultat
    echo "<tr>";
    echo " 
    <th>id</th>
    <th>nom</th>
    <th>mail</th>
    <th>message</th>
    
    ";
    echo "</tr>";
    while ($donnees = $reponse->fetch())
    {
        //On affiche les données dans le tableau
       
        echo "<tr>";
        
        echo "<td> $donnees[id_contact] </td>";
        echo "<td> $donnees[nom] </td>";
        echo "<td> $donnees[mail] </td>";
        echo "<td> $donnees[message] </td>";
        
        
        echo "</tr>";
     
         
    }
    $reponse->closeCursor();
    
    ?>
    </table>
    <br>
    </div>
    <div>

    <div>
   
   <form action="" method="POST" style="width: 50%; margin:auto">
   <div style="width: 100%;
       padding: 30px 20px;
       margin: auto;
       background-color:#82818a1a;
       display: inline-block;
       border: 2px solid #fff;
       box-sizing: border-box;">
       <h2>supprimer un message </h2>
       <label for="">identifant de message: </label>
       <br>
       <input type="number" name="idmessage" required placeholder="example :33">
       <button type="submit" name="valider" class="btn btn-primary">supprimer le message</button>
   </div>
   </form>
   <?php 
   
   if(isset($_POST['valider']))
   {
       if(isset($_POST['idmessage']))
       {
           if(!empty($_POST['idmessage']))
           {
               $idmessage=$_POST['idmessage'];
               $idmessage=(int)$idmessage;
               
               try {
                supprimer_contact($idmessage);

               }
               catch(Exception $e)
               {
               $e->getMessage();
               
           }
           }
       }
   }
   
   ?>
</div>
<div>
   
        <form action="" method="POST" style="width: 50%; margin:auto">
        <div style="width: 100%;
            padding: 30px 20px;
            margin: auto;
            background-color:#82818a1a;
            display: inline-block;
            border: 2px solid #fff;
            box-sizing: border-box;">
            <h2>supprimer une reservation </h2>
            <label for="">identifiant de la reservation: </label>
            <br>
            <input type="number" name="id_rsv" required placeholder="example :24">
            <button type="submit" name="valider" class="btn btn-primary">supprimer la reservation</button>
        </div>
        </form>
        <?php 
        
        if(isset($_POST['valider']))
        {
            if(isset($_POST['id_rsv']))
            {
                if(!empty($_POST['id_rsv']))
                {
                    $id_rsv=$_POST['id_rsv'];
                    $id_rsv=(int)$id_rsv;
                    
                    try {
                        supprimer_rsv($id_rsv);

                    }
                    catch(Exception $e)
                    {
                    $e->getMessage();
                    
                }
                }
            }
        }
        
        ?>
    </div>
    

    </div>
    <h3> Menu </h3>
    <br>
    <table>
    <?php 
    $reponse = $bdd->query('SELECT * FROM menu');
  
    // On affiche le resultat
    echo "<tr>";
        echo " 
        <th>id</th>
        <th>nom</th>
        <th>prix</th>
        <th>descr</th>
        <th>src</th>
        <th>images</th>";
        echo "</tr>";
    while ($donnees = $reponse->fetch())
    {
        //On affiche les données dans le tableau
        

        echo "<tr>";
        echo "<td> $donnees[id] </td>";
        echo "<td> $donnees[nom] </td>";
        echo "<td> $donnees[prix] </td>";
        echo "<td> $donnees[description] </td>";
        echo "<td> $donnees[src] </td>";
        echo "<td><img src=$donnees[src]></td>";
        
        echo "</tr>";
     
         
    }
    $reponse->closeCursor();
    
    ?>
    </table>
    <br>
    <?php
    }
    else {
        echo "se reconecter";

    }
    ?>
    <style>
        h2,h3 {
            text-align: center;
        }
            img {
                width: 50px;
            }
            table, th, td  {
            border: 1px solid black;
            }
            table {
            width: 90%;
            border-collapse: collapse;
            margin: auto;
        }
        </style> 
    </body>
</html>
