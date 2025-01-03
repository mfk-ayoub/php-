

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour ajouter une formation</title>
</head>
<body>
    <form method='POST' action="controlers.php">
   
    <label for="titre">titre de la formation: </label>
    <input type='text' name='titre' required>
    <br>
    
    <label for="prix">prix de la formation: </label>
    <input type='number' step='0.01' name="prix" required>
    <br>
    
    <label for="date_debut">debut de la formation: </label>
    <input type='date' name='date_debut'required>
    <br>
    
    <label for="date_fin">fin de la formation: </label>
    <input type='date' name='date_fin'required>
    <br>
    
    <label for="capacite_max">capacite maximale de la formation: </label>
    <input type='int' name='capacite'required>
    <br>
    <button type="submit">ajouter la formation</button>
    </form>

</body>
</html>
