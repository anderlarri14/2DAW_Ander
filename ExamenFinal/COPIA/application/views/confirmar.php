<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirmacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    if (isset($this->session->idUsuario)) {
        echo "<h1>All the trips for: ". $this->session->userName ."</h1><br>";
        echo "<table border=1px>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "<th>Origin</th>";
        echo "<th>Destination</th>";
        echo "<th>Price</th>";
        echo "<tr>";
        foreach ($confirmar as $aux) {
            echo "<tr>";
            echo "<td>". $aux->date ."</td>";
            echo "<td>". $aux->origin ."</td>";
            echo "<td>". $aux->destination ."</td>";
            echo "<td>". $aux->price ."</td>";
            echo "</td>";
        }
        echo "</table>";
        echo "<a href=\"../../\">Exit</a>";
    } else {
        redirect("../../../../");
    }
    
    ?>
    <br><br><br><br><br><br><br><br>
    <?php
    var_dump($confirmar);
    ?>
</body>
</html>