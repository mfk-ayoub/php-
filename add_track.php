<?php
require 'controler/controler_progression.php';
require 'connecter/connect.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    echo "Invalid request method.";
    exit(0);
}

if (!isset($_POST['participant_id']))
{
    echo "svp enter participant_id";
    exit(0);
}
if (!isset($_POST['formation_id']))
{
    echo "svp ennter id_formatiom";
    exit(0);
}
if (!isset($_POST['score_quiz']))
{
    echo "svp enter score de quiz";
    exit(0);
}

$termine = 0;
if (isset($_POST['termine']))
    $termine = 1;

$progression = New ProgressionColtroler($conn);

$rs = $progression->add_Progression($_POST['participant_id'], $_POST['formation_id'], $_POST['score_quiz'], $termine);

if ($rs === true)
{
    echo "success";
    
}
else if ($rs === false)
{
    echo "error";

}
else
{
    echo $rs;
}