<?php
$server="localhost";
$dbname="Centre_de_formations";
$username="root";
$password=" ";
try
{
    $conn = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    $errorMessage = "Erreur dans la connexion: " . $e->getMessage();
    echo '
        <link rel="stylesheet" href="../css/error.css">
        <body>
            <div class="error">
                <h1>Erreur</h1> 
                <p class="error-message">' . htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') . '</p>
            </div>
        </body>
    ';
    exit(1);
}

?>