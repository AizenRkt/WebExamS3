<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Animal</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #ddd; }
        input { width: 100%; border: none; text-align: center; }
        .btn { padding: 10px 20px; margin-top: 10px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>TYPE ANIMAL</h2>

    <form method="post" action="<?= Flight::base() ?>/type-animal/update" onsubmit="return validateAndSubmit(this);">
        <button type="button" class="btn btn-primary" onclick="NewTypeAnimal()" style="margin-left:850px; margin-top: 10px;">New espece</button>
        <table id="typeAnimalTable" class="table">
            <tr>
                <th>Espece</th>
                <th>Poids_minimal_vente</th>
                <th>Prix de vente kg</th>
                <th>Poids Maximal</th>
                <th>Nb jour sans manger</th>
                <th>%_perte_de_poids</th>
            </tr>
            <?php foreach ($types as $animal) : ?>
                <tr>
                    <td><input type="text" name="data[<?= $animal['idTypeAnimal'] ?>][espece]" value="<?= $animal['espece'] ?>"></td>
                    <td><input type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][poids_minimal_vente]" value="<?= $animal['poids_minimal_vente'] ?>"></td>
                    <td><input type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][prix_vente_kg]" value="<?= $animal['prix_vente_kg'] ?>"></td>
                    <td><input type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][poids_max]" value="<?= $animal['poids_max'] ?>"></td>
                    <td><input type="number" name="data[<?= $animal['idTypeAnimal'] ?>][jours_sans_manger]" value="<?= $animal['jours_sans_manger'] ?>"></td>
                    <td><input type="text" name="data[<?= $animal['idTypeAnimal'] ?>][perte_poids_jour]" value="<?= $animal['perte_poids_jour'] ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <button type="submit" class="btn">Valider</button>
    </form>


    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function NewTypeAnimal() {
            let table = document.getElementById("typeAnimalTable");      
            let newRow = table.insertRow(-1); 
            
            // ID aléatoire temporaire pour les nouveaux éléments (peut être remplacé par l'ID réel après l'ajout en base)
            let tempId = "new_" + Math.floor(Math.random() * 10000); 

            newRow.innerHTML = `
                <td><input type="text" name="data[${tempId}][espece]" value=""></td>
                <td><input type="number" name="data[${tempId}][poids_minimal_vente]" value="0"></td>
                <td><input type="number" name="data[${tempId}][prix_vente_kg]" value="0"></td>
                <td><input type="number" name="data[${tempId}][poids_max]" value="0"></td>
                <td><input type="number" name="data[${tempId}][jours_sans_manger]" value="0"></td>
                <td><input type="number" name="data[${tempId}][perte_poids_jour]" value="0"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
            `;
        }

        function removeRow(button) {
            let row = button.closest("tr");
            row.remove();
        }

        function validateAndSubmit(form) {
            let inputs = form.querySelectorAll("input[type='text'], input[type='number']");
            for (let input of inputs) {
                if (input.value.trim() === "") {
                    alert("Tous les champs doivent être remplis.");
                    return false;
                }
            }
            form.submit();
        }

    </script>

</body>
</html>
