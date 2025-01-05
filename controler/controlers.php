<?php
require '../helper/connect.php'; 
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
            $this->displayMessage("Invalid request method", "info");
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
            $this->displayMessage("Formation added successfully", "success");
        }
        catch (Exception $e)
        {
            $this->displayMessage("Error adding formation: " . $e->getMessage(), "error");
        }
    }

    private function displayMessage($message, $type)
    {
        echo "<div class='$type'>$message</div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formation Management</title>
    <link rel="stylesheet" type="text/css" href="css/controller.css"> 
</head>
<body>
    <?php
    $controller = new Ctr_formation($conn);
    ?>
</body>
</html>
