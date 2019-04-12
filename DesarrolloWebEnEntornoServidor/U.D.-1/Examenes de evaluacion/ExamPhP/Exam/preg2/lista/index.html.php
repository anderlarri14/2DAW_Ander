<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista Cookies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Info</h1>
    <h2>For the saved cookie: <?php echo $_COOKIE['pais'];?> </h2>
    <?php
    $cookie = $_COOKIE['pais'];
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        if ($p = 'p') {
            $conexion = new conexion();
            $result = $conexion->query("SELECT Population FROM country Where Code = '$cookie'");
            foreach ($result as $aux) {
                echo "The population is ". $aux['Population'];
            }
        } else {
            
        }
        
    }

    ?>
</body>
</html>