<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Principal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css">
	<script src="main.js"></script>
</head>

<body>
	<h1>Welcome to the service!</h1><br>
	<span>Insert user to enter system.</span><br><br>

	<form action="index.php/main/logueo/" method="post">
		<label for="logUser">User name: </label>
		<input type="text" name="logUser"><br>

		<label for="logPass">Key word: </label>
		<input type="password" name="logPass"><br>
        
		<input type="submit" value="ok">
	</form>
</body>

</html>
