<?php
include '../Model/connexion.php';

if (
    !empty($_POST['nom_produit'])
    &&  !empty ($_POST['categorie'])
    &&  !empty ($_POST['provenance'])
    &&  !empty ($_POST['quantite'])
    &&  !empty ($_POST['prix_unitaire'])
    &&  !empty ($_POST['date_livraison'])
    &&  !empty ($_POST['id'])
  ) {
    $sql="UPDATE gestion_stock.produit SET nom_produit=?, categorie=?, provenance=?, quantite=?, prix_unitaire=?, date_livraison=? WHERE id=?";
        
        $req= $connexion->prepare($sql);
        $req->execute(array(
            $_POST['nom_produit'],
            $_POST['categorie'],
            $_POST['provenance'],
            $_POST['quantite'],
            $_POST['prix_unitaire'],
            $_POST['date_livraison'],
            $_POST['id'],
));
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "Produit bien modifie avec succes ";
            $_SESSION['message']['type'] = "success ";
        }else {
            $_SESSION['message']['text'] = "Rien a ete modifie ";
            $_SESSION['message']['type'] = "warning ";
        }
} else {
    $_SESSION['message']['text'] = "Tous les informations sont obligatoires ";
    $_SESSION['message']['type'] = "danger ";
}
header('Location: ../View/produit.php');
?>