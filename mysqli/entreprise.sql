CREATE DATABASE IF NOT EXISTS entreprise;

USE entreprise;

CREATE TABLE employes (
  id_employes INT NOT NULL AUTO_INCREMENT,
  prenom VARCHAR(20) NOT NULL,
  nom VARCHAR(20) NOT NULL,
  sexe ENUM('m','f') NOT NULL,
  service VARCHAR(30) NOT NULL,
  date_embauche DATE NOT NULL,
  salaire INT NOT NULL,
  PRIMARY KEY (id_employes)
) ENGINE=InnoDB ;

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '1999-12-09', 5000),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2000-01-15', 2300),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 3550),
(417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 1900),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 1600),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 1900),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 3100),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 4500),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 1900),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 2700),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2007-01-18', 1390),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2008-12-03', 2000),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2009-11-17', 1500),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 1500),
(802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 2250),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2011-09-28', 1700),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 3200),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2013-01-03', 2550),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2014-09-11', 1800),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2015-06-02', 1775);

CREATE TABLE localite (
  id_localite int NOT NULL auto_increment,
  id_secteur int NOT NULL,
  ville varchar(255) NOT NULL,
  chiffre_affaires int NOT NULL,
  PRIMARY KEY  (id_localite)
) ENGINE=InnoDB;



INSERT INTO localite (id_localite, id_secteur, ville, chiffre_affaires) VALUES
(1, 10, 'paris', 525345),
(2, 20, 'marseille', 501236),
(3, 30, 'lyon', 377569),
(4, 40, 'bordeaux', 350988),
(5, 50, 'paris', 122689);

ALTER TABLE employes ADD COLUMN id_secteur int;

UPDATE employes SET id_secteur = 10 WHERE id_employes < 600;
UPDATE employes SET id_secteur = 30 WHERE id_employes > 800;
