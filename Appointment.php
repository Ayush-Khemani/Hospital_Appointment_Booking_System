<?php include_once "header.php";

    if  (!$_SESSION || !$_SESSION['fullname'] || !$_SESSION['age']) {
        header("location: login.php");
        exit;
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../Styles/registeration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="body-color">
    <form  action="send.php" method="POST" novalidate class="p-4 mt-5 w-50 mx-4" >
        <!-- Name -->
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text"  class="form-control" id="fullname" name="fullname" value="<?= $_SESSION['fullname'] ?? '' ?>">
        </div>

        <!-- Age -->
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number"  class="form-control" id="age" name="age" value="<?= $_SESSION['age'] ?? '' ?>">
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label><br>
            <select name="gender" id="gender">
                <option value="<?= $_SESSION['gender'] ?>" selected><?= $_SESSION['gender'] ?></option>
            </select>
        </div>

        <!-- Appoitment date -->
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date"  class="form-control" id="date" name="date">
        </div>


         <!-- Available doctors -->
         <div class="mb-3">
            <label for="doctor" class="form-label">Doctor</label><br>
            <select name="doctor" id="doctor">
                <option value="DR. Prag Patel">DR. Prag Patel</option>
                <option value="DR. Ashesh Khemani">DR. Ashesh Khemani</option>
                <option value="DR. Mithali Kapoor">DR. Mithali Kapoor</option>
                <option value="DR. Aneesh Chawla">DR. Aneesh Chawla</option>
            </select>
        </div>
        
        <!-- Available Time-Slots -->
        <div class="mb-3">
            <label for="time" class="form-label">Time</label><br>
            <select name="time" id="time">
                <option value="9:15-9:30 AM">9:15-9:30 AM</option>
                <option value="9:30-9:45 AM">9:30-9:45 AM</option>
                <option value="9:45-10:00 AM">9:45-10:00 AM</option>
                <option value="10:15-10:30 AM">10:15-10:30 AM</option>
            </select>
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>