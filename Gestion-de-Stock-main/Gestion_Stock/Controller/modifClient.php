<?php
include '../Model/connexion.php';

if (
    !empty($_POST['nom'])
    &&  !empty ($_POST['prenom'])
    &&  !empty ($_POST['telephone'])
    &&  !empty ($_POST['adresse'])
 
    &&  !empty ($_POST['id'])
  ) {
    $sql="UPDATE gestion_stock.client SET nom=?, prenom=?, telephone=?, adresse=? WHERE id=?";
        
        $req= $connexion->prepare($sql);
        $req->execute(array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['adresse'],
            $_POST['telephone'],
          
            $_POST['id'],
));
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "Client bien modifie avec succes ";
            $_SESSION['message']['type'] = "success ";
        }else {
            $_SESSION['message']['text'] = "Rien a ete modifie ";
            $_SESSION['message']['type'] = "warning ";
        }
} else {
    $_SESSION['message']['text'] = "Tous les informations sont obligatoires ";
    $_SESSION['message']['type'] = "danger ";
}
header('Location: ../View/client.php');
?>