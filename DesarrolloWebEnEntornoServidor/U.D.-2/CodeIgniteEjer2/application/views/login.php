<html>
    <head>
        <title>Start login page</title>
        <link href="css/CSSlogin.css" rel="stylesheet" type="text/css"/>
        <link href="../css/CSSlogin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h2>Start login page</h2>
        <div class="container">


            <div class="login">
                <center>
                    <form action="index.php/PerfilController" method="post">
                    Username<br>
                    <input style="text-align: center;"type="text" name="usuario" placeholder="Enter Username" required><br>
                    Password<br>
                    <input style="text-align: center;" type="password" name="contra" placeholder="Enter Password" required><br>

                    <input class="AcceptarLogin" type="submit" value="Login">
                    </form>
                </center>
            </div>
            <div class="registrar">
                <center>
                    <form action="index.php/RegistrarController">
                    <input class="AcceptarLogin" type="submit" value="New User">
                    </form>
                </center>
            </div>    

        </div>
    </body>
</html>

