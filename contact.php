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

 
 if (isset($_POST['nom']) && isset($_POST['email'])	&& isset($_POST['message'])   )
    {  
        if (!empty($_POST['nom']) && !empty($_POST['email'])	&& !empty($_POST['message'])  )
            {
                $nom =$_POST['nom'] ;
                $email= $_POST['email'];
                $message= $_POST['message'];

                try {
                    $req = $bdd ->prepare("INSERT INTO contacte (nom ,mail , message ) VALUES (?,?,? ) ");
                    $req->bindParam(1, $nom, PDO::PARAM_STR);
                    $req->bindParam(2, $email, PDO::PARAM_STR);
                    $req->bindParam(3, $message, PDO::PARAM_STR);
                    
                    $req->execute() ;
                    header('Location: contact.php');
                
                    } 
                catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
                



 

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <li><a href="index.php" >Acueil</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#cta">Reservaton</a></li>
                        <li><a href="#contact" class="active">Nous contacter</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </ul>
                </nav>
             </div>
        </header>
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center">CONTACT</h2>
            
            <div class="w3-row w3-padding-32">
              <div class="w3-col m6 w3-large w3-margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Lille, France<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone: +33 13131313<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email: restoblazou@mail.com<br>
              </div>
              <div class="w3-col m6">
                <form action="" method="POST">
                  <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                    <div class="w3-half">
                      <input class="w3-input w3-border" type="text" placeholder="Nom" required name="nom">
                    </div>
                    <div class="w3-half">
                      <input class="w3-input w3-border" type="text" placeholder="Email" required name="email">
                    </div>
                  </div>
                  <input class="w3-input w3-border" style="height: 70px" type="text" placeholder="Message" required name="message">
                  <button class="w3-button w3-black w3-section w3-right" type="submit">ENVOYER</button>
        
                </form>
              </div>
            </div>
          </div>
         </div> 
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
                                <a href="#"><img src="./assets/icons/facebook.svg" alt="reseaux sociaux"></a>
                                <a href="#"><img src="./assets/icons/instagram.svg" alt="reseaux sociaux"></a>
                                <a href="#"><img src="./assets/icons/twitter.svg" alt="reseaux sociaux"></a>
                            </div>
                        </div>
                        <!-- fin de colone    -->
                        <!-- debut de colone -->
                        <div class="col-1-4">
                            <h3>Navigation</h3>
                            <ul class="links">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="#">Menu</a></li>
                                <li><a href="#">produits</a></li>
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
                                <li><a href="index.php">reserver une table</a></li>
                                <li><a href="contact.php">service client</a></li>
                                <li><a href="#">Mention légales</a></li>
                                <li><a href="#">contact</a></li>
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