<html>
    <head>
        <title>Registrar</title>
        <link href="../css/CSSedit.css" rel="stylesheet" type="text/css"/>
        <script src="../js/myFunctions.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div class="container">
            <h2>Create New User</h2>
            <div class="content">
                <center>
                    
                    Username:<br>
                    Name:<br>
                    <input type="text" name="username" required><br>
                    Surname:<br>
                    <input type="text" name="username" required><br>
                    Email:<br>
                    <input type="email" name="username" required><br>
                    HomePage:
                    <input type="url" name="homepage" required><br>
                    Username Imagen:<br>
                    <input type="file" name="imagen" required>
                    
                    Change Password:<input id="check" type="checkbox" name="mostrar" onclick="mostarInput()">
                    <input id="contra" type="password" name="password" placeholder="Enter Password" required><br>
                    <input id="contra1" type="password" name="repassword" placeholder="Retype Password" required><br>
                
                    <input class="registrar" type="submit" value="Update">
                    <input class="registrar" type="submit" value="Logout">
                </center>
            </div>
            
        </div>
    </body>
</html>

