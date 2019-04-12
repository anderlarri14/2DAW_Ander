<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nueva Reparación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Reparaciones</h1><br><br>

    <!-- <?php //echo form_open('main/addReparacion/');?> -->
    <form action="main/addReparacion/" method="post">
        <input type="hidden" name="idCliente" value="<?php echo $vehiculo->customer; ?>">
        <label for="newMatricula">Matricula</label>
        <input type="text" name="newMatricula" value="<?php echo $vehiculo->plate; ?>" ><br>
        <label for="newCliente">Nombre Cliente</label>
        <input type="text" name="newCliente" value="<?php echo $contacto->name; ?>"><br>
        <label for="newModelo">Modelo</label>
        <input type="text" name="newModelo" value="<?php echo $vehiculo->model; ?>"><br>
        <label for="newMarca">Marca</label>
        <input type="text" name="newMarca" value="<?php echo $vehiculo->brand; ?>"><br>
        <label for="newFecha">Fecha</label>
        <input type="date" name="newFecha" required><br><br><br>

        <?php
        foreach ($allTareas as $todasTareas) {
            $encontrado = false;
            foreach ($chkTareas as $misTareas) {
                if ($todasTareas->taskDescr == $misTareas->Tareas) {
                    $encontrado = true;
                }
            }
            if ($encontrado == true) {
                echo "<input type=\"checkbox\" name=\"newTareas[]\" checked value=\"". $todasTareas->idTask ."\">". $todasTareas->taskDescr . "<br>";
                
            } else {
                echo "<input type=\"checkbox\" name=\"newTareas[]\" value=\"". $todasTareas->idTask ."\">". $todasTareas->taskDescr . "<br>";
                
            }
            
        }
        ?>
        <br>
        <input type="submit" value="Realizar Consulta">
    </form>
    
</body>
</html>