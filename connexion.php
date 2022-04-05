<?php session_start();  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>page de connexion</title>
        <link rel="stylesheet" href="style2.css">

        
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="./assets/icons/fork-and-knife.svg" alt="logo">
                        RESTO Blazou
                    </div>
                    <ul class="navbar">
                        <li><a href="index.php">Acueil</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#cta">Reservaton</a></li>
                        <li><a href="contact.php">Nous contacter</a></li>
                        <li><a href="connexion.php" class="active">Connexion</a></li>
                    </ul>
                </nav>
             </div>
        </header>
        <?php 
            //echo "nom= ".$_SESSION['nomUtil'];
            //echo "mdp= ".$_SESSION['mdp'];
            if ((isset($_SESSION['nomUtil'])) && (isset($_SESSION['mdp'])))
            {
                echo "<h1 style='text-align:center;'>Vous étes déja connectés</h1>";
            }else{

        ?>
        <div id="pagedeconnexion">
            <!-- zone de connexion -->
            
            <form class="pagedeconnexion" action="authentification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur :</b></label>
                <input class="utilisateur" type="text" placeholder="Entrer le nom d'utilisateur" name="nomUtil" required>

                <label><b>Mot de passe :</b></label>
                <input class="motdepasse" type="password" placeholder="Entrer le mot de passe" name="mdp" required>

                <input type="checkbox">
                <label> Se souvenir de moi </label>
                <br>
                
                <?php
                if (isset($_GET['erreur'])){
                    echo"<strong style='color:red;'> Mot de passe ou nom d'utilisateur incorrect !</strong>";
                } 
                ?>
                <input class="submit" type="submit" id='submit' value='CONNEXION' name="connexion" >
                <a href="">Mot de passe oublié ?</a>
               
            </form>
        </div>
        <?php 
            }
               

        ?>
        <footer>
        <div class="footer-links">
            <div class="container">
                <div class="row">
                    <!-- debut de colone -->
                    <div class="col-1-4">
                        
                        <div class="logo">
                            <img src="./assets/icons/fork-and-knife.svg" alt="logo">
                            Resto Blazou
                        </div>
                        <div class="reseaux-links">
                            <a href="https://www.facebook.com/"><img src="./assets/icons/facebook.svg" alt="reseaux sociaux"></a>
                            <a href="https://www.instagram.com/"><img src="./assets/icons/instagram.svg" alt="reseaux sociaux"></a>
                            <a href="https://www.twitter.com/"><img src="./assets/icons/twitter.svg" alt="reseaux sociaux"></a>
                        </div>
                    </div>
                    <!-- fin de colone    -->
                    <!-- debut de colone -->
                    <div class="col-1-4">
                        <h3>Navigation</h3>
                        <ul class="links">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php/#meuu">Menu</a></li>
                            <li><a href="connexion.php">Connexion</a></li>
                            <li><a href="#">Service client</a></li>
                        </ul> 
                    </div>
                    <!-- fin de colone    -->
                    <!-- debut de colone -->
                    <div class="col-1-4">
                        <h3>Adresse</h3>
                        <ul class="links">
                            <li> 31Avenue de la trillade</li>
                            <li>59010 Lille</li>
                            <li>07.87.58.67</li>
                            <li>restoblazou@gml.com</li>
                            
                        </ul>
                    </div>
                    <!-- fin de colone    -->
                    <!-- debut de colone -->
                    <div class="col-1-4">
                        <h3>Service</h3>
                        <ul class="links">
                            <li><a href="#cta">reserver une table</a></li>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="#">Mention légales</a></li>
                            <li><a href="contact.php">contact</a></li>
                        </ul>
                    </div>
                    <!-- fin de colone    -->
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>
                <a href="#">Resto blazou </a> &copy; 2021
            </p>
        </div>
    </footer> 
    </body>
</html>
