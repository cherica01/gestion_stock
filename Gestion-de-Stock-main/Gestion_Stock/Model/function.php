<?php
include 'connexion.php';
function getProduit($id=null)
{
    if(!empty($id)){
        $sql ="SELECT * FROM gestion_stock.produit WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    }else {
        $sql ="SELECT * FROM gestion_stock.produit";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
};

function getClient($id=null)
{
    if(!empty($id)){
        $sql ="SELECT * FROM gestion_stock.client WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    }else {
        $sql ="SELECT * FROM gestion_stock.client";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
};
function getVente($id=null)
{
    if(!empty($id)){
        $sql ="SELECT nom_produit, nom, prenom, v.quantite, prix, date_vente,v.id, prix_unitaire, adresse, telephone
        FROM gestion_stock.client As c, gestion_stock.vente AS v, gestion_stock.produit AS a WHERE v.id_article=a.id AND v.id_client=c.id AND v.id=? AND etat=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id,1));
        return $req->fetch();
    }else {
        $sql ="SELECT nom_produit, nom, prenom, v.quantite, prix, date_vente, v.id, a.id AS idArticle
        FROM gestion_stock.client As c, gestion_stock.vente AS v, gestion_stock.produit AS a WHERE v.id_article=a.id AND v.id_client=c.id AND etat=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array(1));
        return $req->fetchAll();
    }
};
?>