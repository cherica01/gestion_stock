<?php
include '../Model/connexion.php';
include_once "../Model/function.php";

if (
    !empty($_POST['id_article'])
    &&  !empty ($_POST['id_client'])
    &&  !empty ($_POST['quantite'])
    &&  !empty ($_POST['prix'])
  ) {
    $produit = getProduit($_POST['id_article']);

    if(!empty($produit) && is_array($produit)){
        if ($_POST['quantite']>$produit['quantite']){
            $_SESSION['message']['text'] = " Cette quantite a vendre n'est pas disponible ";
            $_SESSION['message']['type'] = "danger ";
        }else{

       $sql= "INSERT INTO $nom_base_donne.vente(id_article, id_client, quantite, prix )
        VALUES(?, ?, ?, ?)";
        $req= $connexion->prepare($sql);
        $req->execute(array(
            $_POST['id_article'],
            $_POST['id_client'],
         
            $_POST['quantite'],
            $_POST['prix'],
           
        ));
 
        if ( $req->rowCount()!=0) {
            $sql = "UPDATE gestion_stock.produit SET quantite=quantite-? WHERE id=? ";
            $req= $connexion->prepare($sql);
        $req->execute(array(
           
           $_POST['quantite'],
           $_POST['id_article'],
        ));
        if ( $req->rowCount()!=0){
            $_SESSION['message']['text'] = "Vente bien effectué ";
            $_SESSION['message']['type'] = "success ";
        } else{
            $_SESSION['message']['text'] = "impossible d'effectuer la vente ";
            $_SESSION['message']['type'] = "danger ";
        }
    }else {
            $_SESSION['message']['text'] = "Une erreur lors de la vente ";
            $_SESSION['message']['type'] = "danger ";
        }
    
}
    }
} else {
    $_SESSION['message']['text'] = "Tous les informations sont obligatoires ";
    $_SESSION['message']['type'] = "danger ";
}
header('Location: ../View/vente.php');
?>