CREATE DATABASE IF NOT EXISTS exercice_3;
USE exercice_3;
CREATE TABLE movies (
	id_film INT(5) NOT NULL AUTO_INCREMENT,
	title VARCHAR(250) NOT NULL,
	actors VARCHAR(500) NOT NULL,
	director VARCHAR(100) NOT NULL,
	producer VARCHAR(100) NOT NULL,
	year_of_prod YEAR NOT NULL,
	language VARCHAR(250) NOT NULL,
	category ENUM('Action', 'Drama', 'Comedie', 'Metafiction', 'Autre') NOT NULL,
	storyline TEXT,
	video VARCHAR(250),
	PRIMARY KEY (id_film)
) ENGINE=InnoDB ;