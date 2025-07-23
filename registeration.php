<?php
    include_once "header.php";


    // First thing os to validate the forms:
        $errors = [];
        $data = [];
        $input = $_POST;
       
        $is_valid = validate($data, $errors, $input);
        function validate(&$data, &$errors, $input) {
            
           // Validate the name:
           if ((!isset($input['fullname'])) || trim($input['fullname']) === "") {
               $errors []= "Enter the Fullname";
           }
           else {
               $data ['fullname']= $input['fullname'];
           }
       
           // Validate the age:
            if ((!isset($input['age'])) ||  strlen(trim($input['age'])) === 0) {
              $errors[] = "Enter the age";
            }
            else if (!filter_var($input['age'], FILTER_VALIDATE_INT))  {
                $errors[] = "The age must be a number";
            }
            else if ($input['age'] < 1) {
                $errors[]= "The age cannot be 0/negative";
            }
            else {
                $data['age'] = $input['age'];
            }
    
            // Validate the email:
            if ((!isset($input['email'])) || trim($input['email']) === "") {
                $errors[] = "Enter the email";
            }
            else if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL))  {
                $errors[] = "The email format must be correct";
            }
            else {
                $data['email'] = $input['email'];
            }
            
            // Validate the password
            if ((!isset($input['pass'])) || trim($input['pass']) === "") {
                $errors []= "Enter the Password";
            }
            else {
                $data['pass'] = $input['pass'];
            }  
            // Validate the gender 
            if ((!isset($input['gender'])) || trim($input['gender']) === "") {
                $errors []= "Enter the gender";
            }
            else {
                $data['gender'] = $input['gender'];
            } 
           
            return count($errors) === 0;
        }
       
    if ($is_valid) {
        // Store the information in the database and then redirect the user to another page:
        // step no: 1 Setup the connection to the databse:
        // For that we need three variables - host, usrname, pass;
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Hospital";

        // Step no :2 establish a connection to the databse:
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$conn) {
            die("Unable to connect to the database" . mysqli_connect_error());
        }

        //  If the connection is sucessful and all the values are valid then we should insert
        // the values into the databse:
        $fullname = $data['fullname'];
        $age = $data['age'];
        $gender = $data['gender'];
        $email = $data['email'];
        $pass = $data['pass'];

        $sql = "INSERT INTO `PATIENT` (`fname`,`age`, `gender`, `email`, `pass` ) VALUES ('$fullname', '$age', '$gender', '$email', '$pass')";

        $result = mysqli_query($conn, $sql);
        session_start();
        if ($result) { // The patient  has been inserted into the database
            $_SESSION['fullname'] = $data['fullname'];
            
        }
        if(!$result) {
            session_destroy();
            $_SESSION = [];
        }
    }

    if ($_SESSION && $_SESSION['fullname']) {
        header("location: index.php"); // Redirect the user the homepage
        exit;
    }
    
    if ($_GET && $_GET['type'] === "logout"){
        session_destroy();
        $_SESSION = [];
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
    <form  action="registeration.php" method="POST" novalidate class="p-4 mt-5 w-50 mx-4" >
        <!-- Name -->
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text"  class="form-control" id="fullname" name="fullname" value="<?= $data['fullname'] ?? '' ?>">
        </div>

        <!-- Age -->
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number"  class="form-control" id="age" name="age" value="<?= $data['age'] ?? '' ?>">
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label><br>
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <option value="prefer-not-to-say">Prefer not to say</option>
            </select>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="abc@abc.com" class="form-control" id="email" name="email" value="<?= $data['email'] ?? '' ?>" aria-describedby="emailHelp">
        </div>
        
        <!-- Password -->
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?= $data['pass'] ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
    <?php if (count($errors) > 0):?>
        <div class="errors mx-4">
            <ul>
                <?php foreach($errors as $error):?>
                    <li class="error"><?= $error?></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php elseif (count($errors) === 0): ?>
        <div class="sucess mx-4">
            <p class="text-success">You have been registered sucessfully</p>
        </div>
    <?php endif;?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>