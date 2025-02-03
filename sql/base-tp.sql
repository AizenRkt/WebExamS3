CREATE DATABASE AnimalConnect;
use AnimalConnect;

CREATE TABLE Espece (
    idEspece INT PRIMARY KEY AUTO_INCREMENT,
    nomEspece VARCHAR(100) NOT NULL,
    poids_min_vente DECIMAL(6,2) NOT NULL, -- Poids minimal pour la vente
    prix_vente_kg DECIMAL(10,2) NOT NULL, -- Prix de vente au kg
    poids_max DECIMAL(6,2) NOT NULL, -- Poids maximal de l'animal
    nb_jour_sans_manger INT NOT NULL, -- Nombre de jours sans manger avant de mourir
    perte_poids_jour DECIMAL(5,2) NOT NULL -- % perte de poids par jour sans manger
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
    poids_actuel DECIMAL(6,2) NOT NULL, -- Poids actuel de l'animal
    FOREIGN KEY (idEspece) REFERENCES Espece(idEspece)
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

INSERT INTO Espece (nomEspece, poids_min_vente, prix_vente_kg, poids_max, nb_jour_sans_manger, perte_poids_jour) VALUES
('Vache', 150.00, 2.50, 1000.00, 10, 2.00),
('Mouton', 45.00, 3.00, 150.00, 8, 1.50),
('Poulet', 2.00, 5.00, 7.00, 5, 3.00),
('Cheval', 200.00, 4.00, 500.00, 12, 1.00),
('Chèvre', 35.00, 3.50, 120.00, 7, 1.80);

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
