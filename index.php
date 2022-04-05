 <?php 
  require('commandes.php');
  $menus =afficher();
  require('verification.php');
  
                                                          
 if (isset($_POST['date']) && isset($_POST['time'])	&& isset($_POST['personnes']) && isset($_POST['nom']) && isset($_POST['mail'])  )
    {  
        if (!empty($_POST['date']) && !empty($_POST['time'])	&& !empty($_POST['personnes']) && !empty($_POST['nom']) && !empty($_POST['mail']) )
            {
                $date =$_POST['date'] ;
                $time= $_POST['time'];
                $personnes= $_POST['personnes'];
                $nom= $_POST['nom']; 
                $mail=$_POST['mail'];

                
                    
                
               

                try {
                    $req = $bdd ->prepare("INSERT INTO reservation (date , heure  , personnes ,nom ,mail ) VALUES (?,?,?,?,? ) ");
                    $req->bindParam(1, $date, PDO::PARAM_STR);
                    $req->bindParam(2, $time, PDO::PARAM_STR);
                    $req->bindParam(3, $personnes, PDO::PARAM_STR);
                    $req->bindParam(4, $nom, PDO::PARAM_STR);
                    $req->bindParam(5, $mail, PDO::PARAM_STR);
                    $req->execute() ;
                    header('Location: index.php');
                
                    } 
                catch (Exception $e) {
                    echo $e->getMessage();
                }
                
            
                
            }
    }
  
    
    ?> 



<!DOCTYPE html> 
<html lang="fr">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
    
    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    
     
    
    <title>Resto Blazou</title>
</head>
<body class="w3-row">
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="./assets/icons/fork-and-knife.svg" alt="logo">
                    RESTO Blazou
                </div>
                <ul class="navbar">
                    <li><a href="index.php" class="active">Acueil</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#cta">Reservaton</a></li>
                    <li><a href="#contact">Nous contacter</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                </ul>
            </nav>
         </div>
    </header>
    <main>
        <section id="head">
            <div class="container">
                <div class="row">
                    <div class="col-1-2 head-info">
                        <h1>Nos Meilleure Recete </h1>
                        <p class="sub-header">Delecieux Menu</p>
                        <p class="sub-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium sapiente
                            iste quasi deserunt aspernatur. A quam debitis, unde maiores eveniet mollitia quos veniam
                            magni dignissimos voluptates deleniti aspernatur explicabo dolore officia reiciendis 
                            recusandae architecto possimus nesciunt repudiandae aliquid? Dicta quae id reprehenderit
                            tempore nihil consequuntur atque possimus impedit sint sunt.</p>
                        <a href="#menu" class="btn">Notre Menu</a>
                    </div>
                    <div class="col-1-2">
                        <img src="./assets/images/dish.png" alt="food" class="head-img" />
                      </div>
                      <div class="clear"></div>
                </div>
            </div>
        </section>    
        <section id="avantages">
            <div class="container">
                <h2>Pourquoi nous sommes les meilleure</h2>
                <div class="row">
                  <!-- debut de col -->
                    <div class="col-1-3">
                        <img src="./assets/icons/adv-1-icon.svg" alt="icon">
                        <h3>Menu bien pour la sante</h3>
                        <p>Lorem ips adipisicing elit. Facilis nulla ipsum suscipit
                            doloribus incimagni  consectetur ullam magnam distinctio.
                        </p>  
                    </div>
                  <!-- fin de col  -->
                  <!-- debut de col -->
                  <div class="col-1-3">
                    <img src="./assets/icons/adv-2-icon.svg" alt="icon">
                    <h3>Menu speacial</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nulla ipsum suscipit
                        doloribusrum. Rem
                        co  distinctio.
                    </p>  
                </div>
              <!-- fin de col  -->
              <!-- debut de col -->
              <div class="col-1-3">
                <img src="./assets/icons/adv-3-icon.svg" alt="icon">
                <h3>Des remise</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nulla ipsum suscipit
                    doloribus incidu  pariatur,distinctio.
                </p>  
            </div>
          <!-- fin de col  -->
          <div class="clear"></div>
                </div>
            </div>
        </section>
        <section id="menu">
            <div class="container">
                <h2>Menu de nos repas</h2>
                <div class="menu-filtres">
                    <div class="filtres">
                        <buttom class="btn btn-small">ptt dejeuner</buttom>
                        <buttom class="btn btn-small">dej</buttom>
                        <buttom class="btn btn-small">diner</buttom>
                    </div>
                    <a href="#" class="btn">Tout nos  repas</a>
                    <div class="clear"></div>
                </div>   
                <div class="row menu-produits">
                    <!-- debut de menu  -->

                    <?php  foreach($menus as $menu):?>
                    <div class="col-1-3">
                        <div class="produits">
                            <img src="<?= $menu->src ?>"></svg>
                            <div class="produits-info">
                                <h3><?= $menu->nom ?></h3>
                                <!-- <p><?= $menu->description ?></p> -->
                                <span class="prix"><?= $menu->prix?> &#8364; </span>
                                <!-- <button class="produits-btn">+</button> -->
                            </div>
                        </div>
                    </div>
                  
                   
                    <?php  endforeach ;?>

                    <!-- fin de menu    -->
                      <div class="clear"></div>
                </div>
            </div>
        </section>
        <section id="cta">
            <div class="container">
                <div class="book">
                    <div class="book-box">
                        <div class="book-cta">
                            <h2>reserver votre place</h2>
                            <form method="POST">
                                <div class="book-inputs">
                                    <div class="form-group">
                                        <label for="date">date</label>
                                        <input type="date" name="date" id="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">L'heure</label>
                                        <input type="time" name="time" id="time">
                                    </div>
                                    <div class="form-group">
                                        <label for="num">Persones</label>
                                        <select name="personnes" id="personnes">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                        
                                    
                                    <div class="book-inputs">
                                    <div class="form-group">
                                        <label for="nom">nom</label>
                                        <input type="text" name="nom" id="nom">
                                        <label for="mail">Email</label>
                                        <input type="email" name="mail">
                                    </div>
                                </div>
                                <button type="submit" class="btn">Reserver vos palce</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="avis">
            <div class="container">
                <h2>Avis de nos clients</h2>
                <div class="row">
                    <!-- debut de votre avis -->
                    <div class="col-1-3">
                        <div class="avis">
                            <div class="info">
                                <img src="./assets/images/user1.png" alt="">
                                <div class="donnes-client">
                                    <h4>Nico R</h4>
                                    <span>client spécial</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Non, aliquam.
                                </p>
                            <div class="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                            </div>    
                        </div>
                    </div>
                    <!-- fin de votre avis -->
                    <!-- debut de votre avis -->
                    <div class="col-1-3">
                        <div class="avis">
                            <div class="info">
                                <img src="./assets/images/user2.png" alt="">
                                <div class="donnes-client">
                                    <h4>Alex Robert</h4>
                                    <span>client spécial</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Non, aliquam.
                                </p>
                            <div class="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                            </div>    
                        </div>
                    </div>
                    <!-- fin de votre avis -->
                    <!-- debut de votre avis -->
                    <div class="col-1-3">
                        <div class="avis">
                            <div class="info">
                                <img src="./assets/images/user3.png" alt="">
                                <div class="donnes-client">
                                    <h4>Michel dorace</h4>
                                    <span>cliente spécial</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Non, aliquam.
                                </p>
                            <div class="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                                <img src="./assets/icons/star.svg" alt="etoiles">
                            </div>    
                        </div>
                    </div>
                    <!-- fin de votre avis -->
                    <div class="clear"></div>


                    <div class="trois-point">
                        <span></span>
                        <span class="active"></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <div class="contact-box">
                    <div class="contact-info">
                        <h2>service client</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam modi  deleniti temporibus culpa
                            quam, amet  facere! Esse, aperiam?
                        </p>
                    </div>
                    <div class="contact-cta">
                        <a href="contact.php" class="btn">nous contacter</a>
                    </div>
                </div>

            </div>
        </section>
    </main>
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
                            <li><a href="#meuu">Menu</a></li>
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
                            <li><a href="#">service client</a></li>
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

                                      
                                        
                                        
 
                                
                                   
