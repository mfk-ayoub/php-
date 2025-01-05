<?php
class Participant {
    private $conn;

    public $idP;
    public $nom;
    public $prenom;
    public $email;
    public $background;
    public $formation_id;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addParticipant($nom, $prenom, $email, $background, $formation_id) {
     
        try {
            $sql = "INSERT INTO participants (nom, prenom, email, background, formation_id)
                    VALUES (?, ?, ?, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$nom, $prenom, $email, $background, (int)$formation_id]);
            echo "Participant added successfully.";
        } catch (PDOException $e) {
            echo "Error adding participant: " . $e->getMessage();
        }
    }

    public function deleteParticipant($idP) {
        try {
            $sql = "DELETE FROM participants WHERE idP = :idP";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':idP', $idP, PDO::PARAM_INT);
            $query->execute();
            return "Participant deleted successfully.";
        } catch (PDOException $e) {
            return "Error deleting participant: " . $e->getMessage();
        }
    }

    public function getFormation() {
        try {
            $sql = "SELECT idF, titre FROM formations";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error fetching formations: " . $e->getMessage();
        }
    }
}
?>
