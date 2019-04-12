<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NewTrip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        if (is_null(get_cookie('fecha'))) {
            $cookie = array(
                'name' => 'fecha',
                'value' => date('j M Y '),
                'expire' => '3700',
            );
            echo "<span>Hello, <strong>". $this->session->userName ."</strong> it's your first time!</span>";
            $this->input->set_cookie($cookie);
        } else {
            echo "<span>Hello again <strong>". $this->session->userName ."</strong>, your last visit: ". get_cookie('fecha') ."</span>";
            
        }
    
    ?>
    <br><br>
    <form action="../crearViaje/" method="post">
        <label for="newOrigen">Origin: </label>
        <select name="newOrigen">
        <?php
        foreach ($ciudades as $aux) {
            echo "<option value=\"". $aux->idCity ."\">". $aux->cityName ."</option>";
        }
        ?>
        </select><br><br>
        <label for="newDestino">Choose destination: </label>
        <select name="newDestino">
        <?php
        foreach ($ciudades as $aux) {
            echo "<option value=\"". $aux->idCity ."\">". $aux->cityName ."</option>";
        }
        ?>
        </select>
        <input type="date" name="newFecha" required>
        <input type="submit" value="New Trip">
    </form>

</body>
</html>