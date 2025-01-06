<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" type="text/css" href="../css/error.css"> 
</head>
<body>
    <?php 
        if (isset($_GET['message'])) {
            $message = htmlspecialchars($_GET['message']);
            echo '
            <div class="error">
                <h1>Error</h1>
                <p>' . $message . '</p>
            </div>
            ';
        } 
    ?>
</body>
</html>

