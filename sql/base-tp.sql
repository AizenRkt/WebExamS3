CREATE DATABASE AnimalConnect;
USE AnimalConnect;

CREATE TABLE typeAnimal (
    idTypeAnimal INT AUTO_INCREMENT PRIMARY KEY, 
    espece VARCHAR(50) NOT NULL UNIQUE,
    poids_minimal_vente DECIMAL(10,2) NOT NULL,
    prix_vente_kg DECIMAL(10,2) NOT NULL,
    poids_max DECIMAL(10,2) NOT NULL,
    quota_journalier DECIMAL(10,2) NOT NULL,
    jours_sans_manger INT NOT NULL,
    perte_poids_jour DECIMAL(5,2) NOT NULL
);

CREATE TABLE animal (
    idAnimal INT AUTO_INCREMENT PRIMARY KEY,
    idTypeAnimal INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    poids DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idTypeAnimal) REFERENCES typeAnimal(idTypeAnimal)
);

CREATE TABLE aliment (
    idAliment INT AUTO_INCREMENT PRIMARY KEY,
    idTypeAnimal INT,
    nom VARCHAR(255) NOT NULL,
    gain_poids DECIMAL(5,2) NOT NULL,
    prix DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (idTypeAnimal) REFERENCES typeAnimal(idTypeAnimal)
);

CREATE TABLE alimentation (
    idAlimentation INT AUTO_INCREMENT PRIMARY KEY,
    idAnimal INT NOT NULL,
    idAliment INT NOT NULL,
    date_nourrissage DATE NOT NULL,
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal),
    FOREIGN KEY (idAliment) REFERENCES aliment(idAliment)
);

CREATE TABLE typeTransaction (
    idTypeTransaction INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL
);

CREATE TABLE transactions (
    idTransaction INT AUTO_INCREMENT PRIMARY KEY,
    idTypeTransaction INT NOT NULL,
    idAnimal INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_transaction DATE NOT NULL,
    FOREIGN KEY (idTypeTransaction) REFERENCES typeTransaction(idTypeTransaction),
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal)
);

CREATE TABLE capital (
    idCapital INT AUTO_INCREMENT PRIMARY KEY,
    montant DECIMAL(15,2) NOT NULL
);

CREATE TABLE ImageAnimal (
    idImage INT PRIMARY KEY AUTO_INCREMENT,
    idAnimal INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal) ON DELETE CASCADE
);

CREATE TABLE simulationDate (
    idSimulation INT PRIMARY KEY AUTO_INCREMENT,
    date_simulee DATE NOT NULL
);

CREATE TABLE stock (
    idStock INT AUTO_INCREMENT PRIMARY KEY,
    idAliment INT NOT NULL,
    quantite_stock DECIMAL(10,2) NOT NULL, 
    date_ajout DATE NOT NULL,               
    FOREIGN KEY (idAliment) REFERENCES aliment(idAliment)
);

CREATE TABLE mort (
    idMort INT AUTO_INCREMENT PRIMARY KEY,
    idAnimal INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    poids_final DECIMAL(10,2) NOT NULL,
    date_mort DATE NOT NULL,
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal)
);
