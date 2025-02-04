CREATE DATABASE AnimalConnect;
use AnimalConnect;

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
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal) ON DELETE CASCADE
);

CREATE TABLE simulationDate (
    idSimulation INT PRIMARY KEY AUTO_INCREMENT,
    date_simulee DATE NOT NULL
);


INSERT INTO typeAnimal (espece, poids_minimal_vente, prix_vente_kg, poids_max, jours_sans_manger, perte_poids_jour) VALUES
('Boeuf', 150.00, 2.50, 1000.00, 10, 2.00),
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


INSERT INTO typeTransaction (titre) VALUES
('Achat'),
('Vente');

INSERT INTO capital (montant) VALUES
(30000);

INSERT INTO simulationDate (date_simulee) VALUES ('2025-02-03');

INSERT INTO aliment (nom, gain_poids, img) VALUES
('Foin', 1.50, 'images/foin.jpg'),
('Maïs', 2.00, 'images/mais.jpg'),
('Tourteau de soja', 3.00, 'images/tourteau_soja.jpg'),
('Orge', 1.80, 'images/orge.jpg'),
('Son de blé', 1.20, 'images/son_ble.jpg'),
('Granulés pour volaille', 2.50, 'images/granules_volaille.jpg'),
('Herbe fraîche', 1.00, 'images/herbe_fraiche.jpg'),
('Paille', 0.50, 'images/paille.jpg');

