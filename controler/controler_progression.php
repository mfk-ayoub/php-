<?php
require_once __DIR__ . '/../connecter/connect.php'; 
require_once __DIR__ . '/../model/progression_model.php';

class ProgressionColtroler
{
    private Progression $progression;

    public function __construct($conn)
    {
        $this->progression = new Progression($conn);
    }

    public function add_Progression($participant_id, $formation_id, $score_quiz, $termine = false)
    {
        try 
        {
            $result = $this->progression->addProgression($participant_id, $formation_id, $score_quiz, $termine);
            if ($result)
                return (true);
            else
                return (false);
        } 
        catch (Exception $e) 
        {
            return urlencode($e->getMessage());
            
        }
    }
}

?>
