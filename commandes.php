<?php 
require("connexionbdd.php");

function ajouter($nom , $prix  , $src , $description) 
{
    if (require("verification.php"))
    {
    $req = $bdd ->prepare("INSERT INTO menu (nom , prix  , src ,description ) VALUES (?,?,? ,?) ");
    $req->bindParam(1, $nom, PDO::PARAM_STR);
    $req->bindParam(2, $prix, PDO::PARAM_INT);
    $req->bindParam(3, $src, PDO::PARAM_STR);
    $req->bindParam(4, $description, PDO::PARAM_STR);

    
    $req->execute() ;
    
     return true;
    }
}
function afficher() 
{
    if (require("verification.php"))
    {
        $req=$bdd->prepare("SELECT * FROM menu ORDER BY id DESC");
        $req->execute();
        $donne =$req->fetchAll(PDO::FETCH_OBJ);
        return $donne;
        $req->closeCursor();
    }
}
function supprimer($id)
{
    if(require("verification.php"))
    {
        $req=$bdd->prepare("DELETE FROM menu WHERE id=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}

function supprimer_contact($id)
{
    if(require("verification.php"))
    {
        $req=$bdd->prepare("DELETE FROM contacte WHERE id_contact=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}


function supprimer_rsv($id)
{
    if(require("verification.php"))
    {
        $req=$bdd->prepare("DELETE FROM reservation WHERE id_rsv=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}






?>