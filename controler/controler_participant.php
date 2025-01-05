<?php
require_once __DIR__ . '/../connecter/connect.php'; 
require_once __DIR__ . '/../model/model_participant.php';  
require_once __DIR__ . '/../model/model_formation.php';

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
        $formation_id = $_POST['formation_souhaitee'] ;

        if (!$nom || !$prenom || !$email || !$background || !$formation_id) {
            echo "All fields are required";
            return;
        }

        try {
            $this->model->addParticipant($nom, $prenom, $email, $background, $formation_id);
            self::show();
        } catch (Exception $e) {
            echo "Error adding participant: " . $e->getMessage();
        }
    }

    public function show() {

        header('Location: ../form_participant.php?success');
        exit(0);
    }
}

$controller = new Ctr_participant($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->addParticipant();
} else {
    $controller->show();
}
?>
