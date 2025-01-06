<?php
require '../connecter/connect.php'; 
require '../model/model_formation.php';  

class Ctr_formation
{
    private Formation $model;

    public function __construct($conn)
    {
        $this->model = new Formation($conn);
        $this->addFormation();
    }

    public function addFormation() 
    {
        if ($_SERVER["REQUEST_METHOD"] != 'POST')
        {
            $this->displayMessage("Méthode de demande non valide", "info");
            return;
        }

        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $capacite = $_POST['capacite'];

        try
        {
            $this->model->addFormation($titre, $prix, $date_debut, $date_fin, $capacite);
            $this->displayMessage("Formation ajoutée avec succès", "success");
        }
        catch (Exception $e)
        {
            $this->displayMessage("Erreur lors de l'ajout de la formation :" . $e->getMessage(), "error");
        }
    }

    private function displayMessage($message, $type)
    {
        if ($type === "success")
        {
            echo "<div class='success'> 
                    <h1>succès</h1>
                    <p>$message</p>
                </div>";
        }
        elseif ($type === "error")
        {
            echo "<div class='error'>
                    <h1>erreur</h1>
                    <p>$message</p>
                 </div>";
        }
        else 
        {
            echo "<div class='info'>
                <h1>info</h1>
                <p>$message</p>
            </div>";
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formation ajoutée avec succès </title>
    <link rel="stylesheet" type="text/css" href="../css/success.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css"> 

</head>
<body>
    <?php
    $controller = new Ctr_formation($conn);
    ?>
</body>
</html>
