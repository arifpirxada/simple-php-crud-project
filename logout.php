<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
<?php 
    session_start();
    if(isset($_SESSION['logedin']) || $_SESSION['logedin']==true) {
        $userloged = true; 
    }
    else {
        header('location: login.php');
    }

    ?>
    <link rel="stylesheet" href="css/style.css">
    <header>
        <nav class="navbar">
            <ul class="navList">
                <li class="navItems"><a href="index.php">Home</a></li>
                <li class="navItems"><a href="about.php">About</a></li>
                <?php 
                global $logedin;
                if(!$userloged){
                    echo '<li class="navItems"><a href="login.php">Login</a></li>
                    <li class="navItems"><a href="signup.php">signup</a></li>';
                }
                else{
                    echo '<li class="navItems"><a href="logout.php">Logout</a></li>';
                }

                ?>
            </ul>
        </nav>
    </header>

    <main>
        <div class="contactContainer">
            <div class="formContainer logoutcontainer">
                <form action="logout.php" method="post" >
                    <h3 id="logoutconfirm">Are you sure you want to logout?</h3>
                    <div class="logoutbtncontain">
                        <button type="submit" class="formbtn logoutBtn">Logout</button>
                        <a href="index.php"><button type="button" class="formbtn logoutBtn" id="logoutcancel">cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php 
        include "dbConnect.php";
        // INSERT INTO `user` (`sno`, `email`, `password`, `date`) VALUES ('1', 'ghulam@gmail.com', '2348393', current_timestamp());

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               session_unset();
               session_destroy();
               header('location: index.php');
            }
    ?>
    <footer>
        crud app &copy 2023: All Rights Reserved
    </footer>
    <script src="javascript/main.js"></script>
</body>
</html>