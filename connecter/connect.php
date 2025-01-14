<?php
$server="localhost";
$dbname="Centre_de_formations";
$username="root";
$password="";
try
{
    $conn = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    $errorMessage = "Erreur dans la connexion: " . $e->getMessage();
    echo $errorMessage;
    exit(1);
}

?>
