<?php
session_start();

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

//$password = password_hash($password); to secure the password

if(isset($_POST['login'])){

    

}
//------------------when the correct code is done--------------------------------------------------------------
// <?php
// if(isset($_SESSION['username'])){
//     echo "<center><h1>Bonjour ".$_SESSION['username']. " Comment allez vous aujourd'hui ? :)</h1></center>";
// }
//  à mettre dans le <body> de la page index Admin/moderator.php ET ne pas oublier le sessont_start

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="">

	

	<title>connexion</title>

</head>

<body>
  
<div class="formLogin">
    <form method="POST" action="login.php">

        <div class="label">Username</div>
        <input type="text" name="username" value="username" ></input>

        <div class="label">Password</div>
        <input type="password" name="password"></input>

        <input type="submit" name="login" value="login"></input>
    </form>
    <a href="index.php">BACK</a>
</div>

</body>
</html> 