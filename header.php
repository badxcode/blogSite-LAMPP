<?php
    $page = basename($_SERVER['PHP_SELF'],'.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BlogSite Web Project</title>
  </head>
  <body class="bg-secondary">
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">TechBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link pl-10 <?php if ($page == 'index'){ echo "active"; } else {echo "";}?>" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <!-- nav categories -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Linux</a>
            <a class="dropdown-item" href="#">Windows</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'signup'){ echo "active"; } else {echo "";}?>" href="signup.php">Become an Author?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'login'){ echo "active"; } else {echo "";}?>" href="login.php">Login</a>
        </li>
      </ul>
      <?php 
        if (isset($_GET['keyword']))
        {
          $keyword = $_GET['keyword'];
        }
      ?>
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-sm-2" type="search" placeholder="Search" name="keyword" maxlength="50" autocomplete="off" value="<?= $keyword ?>" required>
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>