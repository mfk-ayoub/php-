

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
    <link rel="stylesheet" type="text/css" href="../css/success.css"> 
</head>
<body>
    <?php 
        if (isset($_GET['success']))
        {
            echo '
            <div class="success">
                <body>
                    <h1>succès</h1> 
                    <p> Nous avons bien reçu votre demande. </p>
                </body>
            </div>
            ';
        }
    ?>
</body>
</html>