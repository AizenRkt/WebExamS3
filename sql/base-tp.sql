CREATE DATABASE AnimalConnect;
use AnimalConnect;

CREATE TABLE typeAnimal (
    idTypeAnimal INT AUTO_INCREMENT PRIMARY KEY,
    espece VARCHAR(50) NOT NULL UNIQUE,
    poids_minimal_vente DECIMAL(10,2) NOT NULL,
    prix_vente_kg DECIMAL(10,2) NOT NULL,
    poids_max DECIMAL(10,2) NOT NULL,
    jours_sans_manger INT NOT NULL,
    perte_poids_jour DECIMAL(5,2) NOT NULL
);

CREATE TABLE animal (
    idAnimal INT AUTO_INCREMENT PRIMARY KEY,
    idTypeAnimal INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    poids DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idTypeAnimal) REFERENCES typeAnimal(idTypeAnimal) ON DELETE CASCADE
);

CREATE TABLE aliment (
    idAliment INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    gain_poids DECIMAL(5,2) NOT NULL,
    img VARCHAR(255) NOT NULL
);

CREATE TABLE alimentation (
    idAlimentation INT AUTO_INCREMENT PRIMARY KEY,
    idAnimal INT NOT NULL,
    idAliment INT NOT NULL,
    date_nourrissage DATE NOT NULL,
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal) ON DELETE CASCADE,
    FOREIGN KEY (idAliment) REFERENCES aliment(idAliment) ON DELETE CASCADE
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
    FOREIGN KEY (idTypeTransaction) REFERENCES typeTransaction(idTypeTransaction) ON DELETE CASCADE,
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal) ON DELETE CASCADE
);

CREATE TABLE capital (
    idCapital INT AUTO_INCREMENT PRIMARY KEY,
    montant DECIMAL(15,2) NOT NULL
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
