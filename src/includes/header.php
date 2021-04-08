<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>COGIP</title>
</head>

<body>
<form action="invoice.php" method="get">
  <header>
    <h1 style="text-align: center;"></h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand"><img src="includes/img/cogip-logo.jpeg" alt="logocogip" width="60px" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link"  href="#">Home</<a name="" id="" class="btn btn-primary" href="#" role="button"></a>
          </li>
          <li class="nav-item">
            <button class="nav-link" name='invoice' href="#">Invoices</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" name='companies' href="#">Companies</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" name='contacts' href="#">Contacts</button>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Connexion
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Admin</a>
              <a class="dropdown-item" href="#">Moderateur</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  </form>