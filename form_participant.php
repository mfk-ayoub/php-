
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour inscrire dans une formation</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <form method='POST' action="controler/controler_participant.php">
   
    <label for="nom">nom: </label>
    <input type="text" name="nom" placeholder="Entrez votre nom" required>
    <br>
    
    <label for="prenom">prenom:  </label>
    <input type="text" name="prenom" placeholder="Entrez votre prenom" required>

    <br>
    
    <label for="email">email: </label>
    <input type='email' name="email" placeholder="Entrey votre  email" required>
    <br>
    
    <label for="background">background: </label>
    <input type='text' name='background'required>
    <br>

    <label for="formation_id">formation souhaitée: </label>
    <select name='formation' required>
        <option value=""> selectionnez une formation</option>
    <?php
    foreach ($formations as $formation):?> ;
    <option value="<?= $formation['idF'];?>"
    <?=htmlspecialchars($formation['nom']);?>
    </option>
    <?php endforeach;?>

</select>

    <button type="submit">inscrire</button>
    </form>
</body>
</html>
