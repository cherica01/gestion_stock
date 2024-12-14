<?php
session_start();
$nom_serveur="localhost";
$nom_base_donne="gestion_stock";
$utilisateur="root";
$mdp="";

try {
    $connexion = new PDO("mysql::host:$nom_serveur;dbname=$nom_base_donne",$utilisateur,$mdp);
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    return $connexion;
    
    
} catch(Exception $e) {
    die("ERREUR DE CONNEXION :" . $e->getMessage()); 
}
?>