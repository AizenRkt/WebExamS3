CREATE DATABASE AnimalConnect;
use AnimalConnect;

CREATE TABLE EspeceAnimal (
    idEspece INT PRIMARY KEY AUTO_INCREMENT,
    prix_vente DECIMAL(10,2) NOT NULL,
    nomEspece VARCHAR(100) NOT NULL
);

CREATE TABLE Aliment (
    idAliment INT PRIMARY KEY AUTO_INCREMENT,
    nomAliment VARCHAR(100) NOT NULL,
    gain_poids DECIMAL(5,2) NOT NULL, -- % de gain de poids par consommation
    prix DECIMAL(10,2) NOT NULL,
    imageAliment VARCHAR(255) NOT NULL
);

CREATE TABLE Animal (
    idAnimal INT PRIMARY KEY AUTO_INCREMENT,
    idEspece INT NOT NULL,
    poids_min DECIMAL(6,2) NOT NULL,
    poids_max DECIMAL(6,2) NOT NULL,
    poids_actuel DECIMAL(6,2) NOT NULL,
    jours_sans_manger INT NOT NULL,
    perte_poids_jour DECIMAL(5,2) NOT NULL, -- % de perte de poids par jour sans manger
    FOREIGN KEY (idEspece) REFERENCES Espece(idEspece) ON DELETE CASCADE
);

CREATE TABLE ImageAnimal (
    idImage INT PRIMARY KEY AUTO_INCREMENT,
    idAnimal INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    FOREIGN KEY (idAnimal) REFERENCES Animal(idAnimal) ON DELETE CASCADE
);

CREATE TABLE Alimentation (
    idAlimentation INT PRIMARY KEY AUTO_INCREMENT,
    idAnimal INT NOT NULL,
    idAliment INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL, -- Quantité de l’aliment donné
    date DATE NOT NULL DEFAULT CURRENT_DATE, -- Ajout de la date par défaut
    FOREIGN KEY (idAnimal) REFERENCES Animal(idAnimal) ON DELETE CASCADE,
    FOREIGN KEY (idAliment) REFERENCES Aliment(idAliment) ON DELETE CASCADE
);

INSERT INTO Espece (nomEspece) VALUES 
('Bœuf'),
('Chèvre'),
('Mouton'),
('Cochon'),
('Cheval');
INSERT INTO Animal (idEspece, poids_min, poids_max, poids_actuel, prix_vente, jours_sans_manger, perte_poids_jour) VALUES 
-- Bœuf
(1, 400.00, 900.00, 600.00, 5.00, 7, 1.50),  
-- Chèvre
(2, 20.00, 80.00, 50.00, 4.00, 10, 2.00),  
-- Mouton
(3, 30.00, 90.00, 60.00, 4.50, 8, 1.80),  
-- Cochon
(4, 50.00, 300.00, 150.00, 3.50, 6, 1.30),  
-- Cheval
(5, 350.00, 1000.00, 700.00, 6.00, 5, 1.20);
INSERT INTO ImageAnimal (idAnimal, titre) VALUES 
(1, 'boeuf.jpg'),
(2, 'chevre.jpg'),
(3, 'mouton.jpg'),
(4, 'cochon.jpg'),
(5, 'cheval.jpg');
