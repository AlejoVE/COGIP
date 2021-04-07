<?php
session_start();

try {
    $db = new PDO("mysql:host=remotemysql.com;dbname=nJpHWU5rJ5;port=3306", "nJpHWU5rJ5", "VnjcIEPzgV");
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}


if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

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
        <input type="text" name="username" value="username" >: username</input>
        <input type="password" name="password">: password</input>
        <input type="submit" name="login" value="login"></input>
    </form>
    <a href="index.php">BACK</a>
</div>

</body>
</html> 