INSERT INTO typeAnimal (espece, poids_minimal_vente, prix_vente_kg, poids_max, jours_sans_manger, perte_poids_jour) VALUES
('Boeuf', 150, 2.5, 1000, 5, 4);

INSERT INTO typeTransaction (titre) VALUES
('Achat'),
('Vente');

INSERT INTO capital (montant) VALUES
(30000);

INSERT INTO simulationDate (date_simulee) VALUES ('2025-02-03');

INSERT INTO aliment (idTypeAnimal, nom, gain_poids, prix) VALUES
(1, "herbe", 7, 10);


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

INSERT INTO aliment (nom, gain_poids, prix) VALUES
('Foin', 1.50, 1.50),
('Maïs', 2.00, 2.00),
('Tourteau de soja', 3.00, 2.00),
('Orge', 1.80, 2.00),
('Son de blé', 1.20, 2.00),
('Granulés pour volaille', 2.50, 2.00),
('Herbe fraîche', 1.00, 2.00),
('Paille', 0.50, 2.00);

