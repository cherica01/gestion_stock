CREATE DATABASE gestion_stock ;
CREATE TABLE Client (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  telephone VARCHAR(255) NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE Produit (
  id INT NOT NULL AUTO_INCREMENT,
  nom_produit VARCHAR(255) NOT NULL,
  categorie VARCHAR(255) NOT NULL,
  provenance VARCHAR(255) NOT NULL,
  quantite INT NOT NULL,
  prix_unitaire DECIMAL(10,2) NOT NULL,
  
  date_livraison DATE,
  
  PRIMARY KEY (id)
);
CREATE TABLE Vente (
  id INT NOT NULL AUTO_INCREMENT,
  id_client INT NOT NULL,
  id_article INT NOT NULL,
  quantite INT NOT NULL,
  prix DECIMAL(10,2) NOT NULL,
  date_vente DATE NOT NULL,
  etat ENUM('0','1') NOT NULL DEFAULT'1',
  PRIMARY KEY (id),
  FOREIGN KEY (id_client) REFERENCES Client(id),
  FOREIGN KEY (id_article) REFERENCES Produit(id)
);


