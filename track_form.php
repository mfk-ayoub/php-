<?php 
error_reporting(E_ALL);
require_once __DIR__ . "/connecter/connect.php";
require_once __DIR__ . "/model/progression_model.php";

$progression = New Progression($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour ajouter une progression</title>
    <link rel="stylesheet" href="css/form.css">

</head>
<body>
    <form method='POST' action="add_track.php">
    <label for="participant_id">id_participant: </label>
    <input type="number" name="participant_id" placeholder="Enter participant id" required>
    <br>
    
    <label for="formation_id">id_formation:  </label>
    <input type="number" name="formation_id" placeholder="Enter course id" required>
    <br>
    
    <label for="score_quiz">score de quiz: </label>
    <input type='number' name="score_quiz" placeholder="Enter quiz score" min="0" max="20" required>
    <br>
    
    <label for="termine">formation termine: </label>
    <input type='checkbox' name='termine' id='termine' value="1">
    <br>

    <button type="submit" name="submit">Ajouter Progression</button>
</form>
</body>
</html>
