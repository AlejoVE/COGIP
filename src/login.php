<?php
session_start();
require_once 'includes/header.php';
require_once 'Model/LoginManager.php';

$new_administrators_object = new AdministratorsManager();
$administrators = $new_administrators_object->getAllAdministrators();
$_SESSION['login'] = " ";
$connect = ' ';
$error=' ';


if (isset($_POST['login']))
{
    // if(!empty($_POST['username']) && !empty($_POST['password'])) 
    // {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        foreach ($administrators as $administrator) 
        {
            if ($username === $administrator['username'] && $password === $administrator['password']) 
            {
                $_SESSION['name'] = $administrator['first_name'];
                $_SESSION['access'] = $administrator['access'];
                $_SESSION['login'] = $_SESSION['name'];
                $connect = 'logged';
            }else $connect = 'error';
        // };
        
        
    };
    echo $connect;
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
<h4> Connection </h4>
<?php if($connect == 'logged'){ ?>
    <div>
        <p> Bon retour parmis nous! </p>
        <a href="index.php">Go Home</a>
    </div>
<?php }  ?>


    <?php if($connect == 'error'){ ?>
        <p>Login or mdp are bad!</p>
    <?php }  ?>
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
