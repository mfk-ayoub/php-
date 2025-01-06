
<?php 
require_once __DIR__ . "/connecter/connect.php";
require_once __DIR__ . "/model/model_participant.php";

$participant = New Participant($conn);

$formations = $participant->getFormation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour inscrire dans une formation</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/success.css"> 

</head>
<body>
    <form method='POST' action="controler/controler_participant.php">
     <!-- <?php 
    if (isset($_GET['success']))
        {
            echo '
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Formation Management</title>
                    <link rel="stylesheet" type="text/css" href="css/success.css"> 
                </head>
                <body>
                    <div class="success_alert">
                        <p>Your request has been add successfully?</p>
                    </div>
                </body>
                </html>';
        }
    ?>  -->

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
        <select name='formation_souhaitee' required>
            <option value="">Sélectionnez une formation</option>
            <?php foreach ($formations as $formation): ?>
                <option value="<?= htmlspecialchars($formation['idF']); ?>">
                    <?= htmlspecialchars($formation['titre']); ?>
                </option>
            <?php endforeach; ?>

        </select>

    <button type="submit">inscrire</button>
    </form>
</body>
</html>

