<?php
include 'connexion.php';

if (
    !empty($_POST['nom_produit'])
    &&  !empty ($_POST['categorie'])
    &&  !empty ($_POST['quantite'])
    &&  !empty ($_POST['provenance'])
    &&  !empty ($_POST['prix_unitaire'])
    &&  !empty ($_POST['date_livraison'])
  

) {
    $sql= "INSERT INTO $nom_base_donne.produit(nom_produit, categorie, provenance, quantite, prix_unitaire, date_livraison)
        VALUES(?, ?, ?, ?, ?, ?)";
        $req= $connexion->prepare($sql);
        $req->execute(array(
            $_POST['nom_produit'],
            $_POST['categorie'],
            $_POST['provenance'],
            $_POST['quantite'],
            $_POST['prix_unitaire'],
            $_POST['date_livraison'],
)); 
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "Produit bien ajoute ";
            $_SESSION['message']['type'] = "success ";
        }else {
            $_SESSION['message']['text'] = "Une erreur s'est produite ";
            $_SESSION['message']['type'] = "danger ";
        }
} else {
    $_SESSION['message']['text'] = "Tous les informations sont obligatoires ";
    $_SESSION['message']['type'] = "danger ";
}
header('Location: ../View/produit.php');
?>