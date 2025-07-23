<?php
  session_start();
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class=" fs-3 d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          HealthCare
        </a>

        <ul class="nav col-12 mx-5 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="index.php" class="nav-link px-2 text-secondary">About</a></li>
        </ul>
        <div class="text-end">
          <?php if ($_SESSION && $_SESSION['fullname']) : ?>
            <a class="btn btn-warning" href="logout.php?type=logout">Logout</a>
          <?php else: ?>
              <a href="login.php" class="btn btn-outline-light me-2">Login</a>
              <a class="btn btn-warning" href="registeration.php">
                Sign-up
                <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
              </a>
          <?php endif;?>         
            <a href="Appointment.php" class="btn btn-warning">Make an Appointment</a>
          <?php if ($_SESSION && $_SESSION['fullname']) :?>
              <p>Hello <?= $_SESSION['fullname']?> !</p>
          <?php endif;?> 
        </div>
        
      </div>
    </div>
    </header>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>