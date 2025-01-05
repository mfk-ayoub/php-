<?php
require '../helper/connect.php'; 
require '../model/model_participant.php';  
require '../model/model_formation.php';

class Ctr_participant {
    private Participant $model;
    private Formation $formation;

    public function __construct($conn) {
        $this->model = new Participant($conn);
        $this->formation = new Formation($conn);
    }

    public function addParticipant() {
        if ($_SERVER["REQUEST_METHOD"] != 'POST') {
            echo "Invalid request method";
            return;
        }

        $nom = $_POST['nom'] ;
        $prenom = $_POST['prenom'] ;
        $email = $_POST['email'] ;
        $background = $_POST['background'] ;
        $dateInscription = $_POST['dateInscription'] ;
        $formation_id = $_POST['formation_souhaitee'] ;

        if (!$nom || !$prenom || !$email || !$background || !$dateInscription || !$formation_id) {
            echo "All fields are required";
            return;
        }

        try {
            $this->model->addParticipant($nom, $prenom, $email, $background, $dateInscription, $formation_id);
            echo "Participant added successfully";
        } catch (Exception $e) {
            echo "Error adding participant: " . $e->getMessage();
        }
    }

    public function show() {
        try {
            $formations = $this->formation->getFormation();
            include 'form_participant.php';
        } catch (Exception $e) {
            echo "Error fetching formations: " . $e->getMessage();
        }
    }
}

$controller = new Ctr_participant($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->addParticipant();
} else {
    $controller->show();
}
?>
