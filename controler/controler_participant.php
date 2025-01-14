

<?php
require_once __DIR__ . '/../connecter/connect.php'; 
require_once __DIR__ . '/../model/model_participant.php';  
require_once __DIR__ . '/../model/model_formation.php';

class Ctr_participant
{
    private Participant $model;
    private Formation $formation;

    public function __construct($conn) {

        $this->model = new Participant($conn);
        $this->formation = new Formation($conn);
    }

    public function addParticipant() 
    {
        if ($_SERVER["REQUEST_METHOD"] != 'POST')
        {
            echo "Invalid request method";
            return;
        }

        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $background = trim($_POST['background'] ?? '');
        $formation_id = trim($_POST['formation_souhaitee'] ?? '');

        if (empty($nom) || empty($prenom) || empty($email) || empty($background) || empty($formation_id))
        {
            echo "All fields are required.";
            return;
        }

        if ($this->model->isEmailExists($email))
        {
            echo "A participant with this email already exists.";
            return;
        }

        try 
        {
            $this->model->addParticipant($nom, $prenom, $email, $background, $formation_id);
            echo "success";
            exit;
        }
        catch (Exception $e)
        {
            $errorMessage = "Error adding participant: " . $e->getMessage();
            $encodedMessage = urlencode($errorMessage);
            return ($encodedMessage);
        }
    }
}

$controller = new Ctr_participant($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $controller->addParticipant();
}
else
{
   echo "success";
}
?>
