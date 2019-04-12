<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pregunta 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="" method="post">
            <label>
                <p>Update Country:</p>
                <select name="pais">
                    <?php
                        $objCountry->option(); 
                    ?>
                </select>
            </label>     
            <br><br>
            <input type="submit" value="Guardar Cookie"><br>
            <a href="lista/?p=p">Total Population</a><br>
            <a href="lista/?p=c">Total of cities</a>
    </form>
</body>
</html>