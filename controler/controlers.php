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
        echo $message , $type ;  
    }
}

?>

<?php
$controller = new Ctr_formation($conn);
?>
