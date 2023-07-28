<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <link rel="stylesheet" href="css/style.css">
    <header>
        <nav class="navbar">
            <ul class="navList">
                <li class="navItems"><a href="index.php">Home</a></li>
                <li class="navItems"><a href="about.php">About</a></li>               
                <li class="navItems"><a href="login.php">Login</a></li>
                <li class="navItems"><a href="signup.php">signup</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <?php 
        include "dbConnect.php";
        // INSERT INTO `user` (`sno`, `email`, `password`, `date`) VALUES ('1', 'ghulam@gmail.com', '2348393', current_timestamp());

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $email = $_POST['email'];
                $password = $_POST["password"];
                $cpassword = $_POST["cpassword"];
                $emailmatch = false;
                $passmatch = false;
                
                // SELECT * FROM `user` WHERE `user`.`email` = 1"

                $sqli = "SELECT * FROM `user` WHERE `user`.`email` = '$email'";
                $resulti = mysqli_query($conn,$sqli);
                $n_emails = mysqli_num_rows($resulti);
                if($n_emails>0){
                    $emailmatch = true;
                }
                else {
                    if($password==$cpassword){
                        $sql = "INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            echo 'sorry!, technical issue ' . mysqli_error($conn);
                        } 
                        global $email;
                        session_start();
                        $_SESSION['logedin'] = true;
                        $_SESSION['email'] = $email;
                        header("location: index.php");
                    }
                    else {
                        $passmatch = true;
                    }
                }
        }

                

       
    ?>
    
        <div class="contactContainer">
            <div class="formContainer">
                <form action="signup.php" method="post">
                    <?php
                        global $emailmatch;
                        if($emailmatch){
                        echo "<p class='exists'>Email already exists!</p>";
                        }
                    ?>
                    <label  class="formItems emailLabel" for="email">Email:</label>
                    <input  class="formItems" required type="text" id="email" name="email" placeholder="Enter your email">
                    <label  class="formItems" for="password">Password:</label>
                    <input  class="formItems" required type="password" id="signpassword" name="password" placeholder="Confirm your password">
                    <label  class="formItems" for="cpassword">Confirm Password:</label>
                    <input  class="formItems" required type="password" id="cpassword" name="cpassword" placeholder="Confirm your password">
                    
                    <?php
                    global $passmatch;
                    if($passmatch){
                        echo "<p class='donotmatch'>Passwords do not match!</p>";
                    }
                    ?>

                    <button type="submit" class="formbtn" id="signBtn">Sign up</button>
                </form>
            </div>
        </div>
    </main>
  
    <footer>
        crud app &copy 2023: All Rights Reserved
    </footer>
    <script src="javascript/main.js"></script>
</body>
</html>