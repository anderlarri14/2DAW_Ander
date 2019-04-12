<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>First Time</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <h1>A session is active</h1><br>
    <?php
        if ($_COOKIE['galleta'] == 1) {
            echo "<h3>Esta es tu primera visita</h3><br><br>";
           
        } else {
            echo "Visitas anteriores: ". $_COOKIE['galleta'];
        }
        
    ?>

    <a href="../destroy/">Logout</a>
</body>
</html>