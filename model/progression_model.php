<?php
class Progression
{
    private $conn;

    public $id;
    public $participant_id;
    public $formation_id;
    public $score_quiz;
    public $termine;

    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function addProgression($participant_id,$formation_id,$score_quiz,$termine=false)
    {
        try
        {
            $query="INSERT INTO progression(participant_id,formation_id,score_quiz,termine) values(?,?,?,?)";
            $exec=$this->conn->prepare($query);
            $exec->execute([$participant_id,$formation_id,$score_quiz,$termine]);
            return (true);
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
}
?>