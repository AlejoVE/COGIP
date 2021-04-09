<?php
session_start();
require_once 'includes/header.php';
require_once 'Model/LoginManager.php';

$new_administrators_object = new AdministratorsManager();
$administrators = $new_administrators_object->getAllAdministrators();
$_SESSION['name'] = " ";
$connect = 0;
echo $connect;

if (isset($_POST['login'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    foreach ($administrators as $administrator) {

        if ($username === $administrator['username'] && $password === $administrator['password']) {
            $nameConnect = $administrator['first_name'];
            $access = $administrator['access'];
            $_SESSION['access'] = $access;
            $_SESSION['name'] = $nameConnect;
            //echo $nameConnect . " " . $access;
            echo $_SESSION['access'];
            echo $_SESSION['name'];
            $connect = 1;
        };
    };
};
?>



<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="icon" type="image/png"  href="styles/img/cogip-logo.jpeg">

	

	<title>Connexion</title>

</head>

<body>
    <div class="formConnexion">
        <form action='#' method='POST'>
            <input type="text" name="username"></input>
            <input type="text" name="password" value="password"></input>
            <button type="submit" name='login' value="Log in">Log in</button>
        </form>
        <a href="index.php">GO BACK</a>
    </div>

</body>

</html>
