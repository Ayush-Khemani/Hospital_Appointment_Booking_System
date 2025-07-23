<?php
        include_once "header.php";
        $errors = [];
        $data = [];
        $input = $_POST;
       
        $is_valid = validate($data, $errors, $input);
        function validate(&$data, &$errors, $input) {
            
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
                       
            return count($errors) === 0;
        }
        $found = false;
        if ($is_valid) {
            // check if the user exist in the database or not:
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
                
                $email = $data['email'];
                $pass = $data['pass'];
        
                $sql = "SELECT COUNT(*), fname, age, gender FROM `PATIENT` WHERE `email` = '$email' AND `pass` = '$pass'";
        
                $result = mysqli_query($conn, $sql); 

                $row = mysqli_fetch_assoc($result);
                // var_dump($row);
                if ($row['COUNT(*)'] == 1) {
                    $found = true;
                    session_start();
                    $_SESSION['fullname'] = $row['fname'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['gender'] = $row['gender'];
                    header("location: index.php");
                    exit;
                }
                if ($row['COUNT(*)'] == 0) {
                    session_destroy();
                    $_SESSION = [];
                    $errors[]  = "Wrong email or password";
                }


            
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
    <form  action="login.php" method="POST" novalidate class="p-4 mt-5 w-50 mx-4" >
        
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

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php if (count($errors) > 0):?>
        <div class="errors mx-4">
            <ul>
                <?php foreach($errors as $error):?>
                    <li class="error"><?= $error?></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>