<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Daniil Sinkevich">

    <title>Index Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/bootstrap.min.css" type="text/css" >
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">
<div class="align-content-xl-center">
  <h1 align="center">Таблица для примера</h1>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

    for ($i=1; $i<=25; $i++)
    {
      echo "<tr>
      <th scope=\"row\">".$i."</th>
      <td>First</td>
      <td>Last</td>
      <td>@handle</td>
      <td><button type=\"button\" class=\"btn btn-success\">Edit</button>
      <button type=\"button\" class=\"btn btn-danger\">Delete</button></td>
    </tr>";
    } ?>

  </tbody>
</table>

  </main><!-- /.container -->
  <script src="<?php echo JQUERY;?>jquery.min.js"></script>
  <script src="<?php echo POPPER;?>popper.min.js"></script>
  <script src="<?php echo BOOTSTRAP;?>js/bootstrap.bundle.min.js"></script>
</body>
</html>
