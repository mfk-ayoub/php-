<?php
require 'connect.php'; 
require 'model_formation.php';  
require 'validation.php'; 

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
            echo "Invalid request method";
            return;
        }

        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $capacite = $_POST['capacite'];

        $validationResult = validateFormationData($titre, $prix, $date_debut, $date_fin, $capacite);
        if ($validationResult !== true)
        {
            echo $validationResult; 
            return;
        }

        try
        {
            $this->model->addFormation($titre, $prix, $date_debut, $date_fin, $capacite);
            echo "Formation added successfully"; 
        }
        catch (Exception $e)
        {
            echo "Error adding formation: " . $e->getMessage();
        }
    }
}

$controller = new Ctr_formation($conn);
?>
