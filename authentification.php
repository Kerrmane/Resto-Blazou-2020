<?php 
session_start();
require('verification.php');

    $mdp=$_POST['mdp'];
    //echo "Le mot de pass est : $mdp";
    $nomUtil=$_POST['nomUtil'];
    
        $req=$bdd->prepare("SELECT * FROM utilisateurs WHERE email='".$nomUtil."' AND passwords='".$mdp."';");
        $req->execute();
        $donne =$req->fetchAll(PDO::FETCH_OBJ);

        if ($donne!=NULL) 
        {
        // foreach ($donne as $moulaga){
        //     echo " <tr>
        //         <td>".$moulaga['prenom']."</td>
        //         <td>".$moulaga['passwords']."</td>
        //     </tr>" ;
        //     }
         $_SESSION['nomUtil']=$nomUtil;
         $_SESSION['mdp']=$mdp;

        header("Location: admin.php" );
            //echo "Bienvenue $nomUtil";
        }
            else{
                header("Location: connexion.php?erreur=motdepass" );        
            //echo "vous etes inconnus";

        }
?>