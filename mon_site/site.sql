CREATE DATABASE IF NOT EXISTS monsite;

USE monsite;

CREATE TABLE IF NOT EXISTS commande(
	id_commande int(3) NOT NULL AUTO_INCREMENT,
	id_membre int(3) DEFAULT NULL,
	montant int(3) NOT NULL,
	date_enregistrement datetime NOT NULL,
	etat enum('en cours de traitement', 'envoyé', 'livré') NOT NULL,
	PRIMARY KEY(id_commande)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS details_commande(
	id_details_commande int(3) NOT NULL AUTO_INCREMENT,
	id_commande int(3) DEFAULT NULL,
	id_produit int(3) DEFAULT NULL,
	quantite int(3) NOT NULL,
	prix int(3) NOT NULL,
	PRIMARY KEY(id_details_commande)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS membre(
	id_membre int(3) NOT NULL AUTO_INCREMENT,
	pseudo varchar(20) NOT NULL,
	mdp varchar(60) NOT NULL,
	nom varchar(20) NOT NULL,
	prenom varchar(20) NOT NULL,
	email varchar(20) NOT NULL,
	civilite enum('m','f') NOT NULL,
	ville varchar(20) NOT NULL,
	code_postal int(5) unsigned zerofill NOT NULL,
	adresse varchar(50) NOT NULL,
	statut int(1) NOT NULL DEFAULT '0',
	PRIMARY KEY(id_membre),
	UNIQUE KEY pseudo(pseudo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS produit (
	id_produit int(3) NOT NULL AUTO_INCREMENT,
	reference varchar(20) NOT NULL,
	categorie varchar(20) NOT NULL,
	titre varchar(100) NOT NULL,
	description text NOT NULL,
	couleur varchar(20) NOT NULL,
	taille varchar(5) NOT NULL,
	public enum('m','f','mixte') NOT NULL,
	photo varchar(250) NOT NULL,
	stock int(3) NOT NULL,
	PRIMARY KEY(id_produit),
	UNIQUE KEY reference (reference)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;