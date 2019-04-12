<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pregunta 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="modificar/" method="get">
            <label>
                <p>Update Country:</p>
                <select name="country">
                    <?php
                        $objCountry->option(); 
                    ?>
                </select>
            </label>     
            <input type="checkbox" name="nombre">Change name or capital<br><br>
            <input type="submit" value="ok">
    </form>
</body>
</html>