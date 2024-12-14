<?php
include 'connexion.php';
if (
    !empty($_POST['nom'])
    &&  !empty ($_POST['prenom'])
    &&  !empty ($_POST['telephone'])
    &&  !empty ($_POST['adresse'])
 
  

) {
    $sql= "INSERT INTO $nom_base_donne.client(nom, prenom, telephone, adresse)
        VALUES(?, ?, ?, ?)";
        $req= $connexion->prepare($sql);
        $req->execute(array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['adresse'],
           
)); 
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "Client bien ajoute ";
            $_SESSION['message']['type'] = "success ";
        }else {
            $_SESSION['message']['text'] = "Une erreur s'est produite ";
            $_SESSION['message']['type'] = "danger ";
        }
} else {
    $_SESSION['message']['text'] = "Tous les informations sont obligatoires ";
    $_SESSION['message']['type'] = "danger ";
}
header('Location: ../View/client.php');
?>