<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        <div class="aboutContainer">
            <img src="images/man.jpg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet minima laboriosam ex. Hic nemo ea adipisci repudiandae molestias fugiat! Suscipit impedit quo maxime molestiae. Eveniet natus excepturi voluptas dolorum ducimus id quasi sapiente reiciendis doloribus, provident repellendus aliquid ratione vero nihil mollitia dolorem culpa nostrum aliquam illo ex vel quaerat possimus? Delectus rem dolorem quibusdam voluptates, at aspernatur commodi officiis libero consequuntur minima aperiam veniam ratione reiciendis sed, dolore officia ut et? Aliquam minima quidem magnam unde aspernatur nemo laudantium laboriosam laborum omnis quod aut nobis rem, maiores qui! Eum odio obcaecati similique. Optio obcaecati maxime, non sequi possimus illo officia odit eos incidunt eligendi facere adipisci nostrum rem aliquam deserunt laborum doloribus quae amet veritatis ratione quia eum provident minus recusandae. Quaerat molestias ipsa corrupti officia dolorum quod at aliquam temporibus odit ratione, itaque dolorem accusantium repellat. At repudiandae, id debitis sunt minus numquam perspiciatis. Quam dolore, aliquid sit commodi possimus veritatis? Nostrum corporis asperiores non voluptatem obcaecati iste labore est accusamus reprehenderit provident itaque, alias cupiditate impedit suscipit voluptates corrupti qui veritatis consectetur maiores, unde repellat commodi quis. Accusamus sapiente quo exercitationem, dolores ipsa soluta quae cumque ea itaque eligendi nam. Nihil autem nemo consequatur, consectetur aut soluta, optio officia quidem ad aperiam, vel eveniet reiciendis? Illo qui inventore suscipit itaque quas. Ducimus minus voluptate, animi expedita officia necessitatibus facere!</p>
        </div>
        <div class="aboutContainer">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet minima laboriosam ex. Hic nemo ea adipisci repudiandae molestias fugiat! Suscipit impedit quo maxime molestiae. Eveniet natus excepturi voluptas dolorum ducimus id quasi sapiente reiciendis doloribus, provident repellendus aliquid ratione vero nihil mollitia dolorem culpa nostrum aliquam illo ex vel quaerat possimus? Delectus rem dolorem quibusdam voluptates, at aspernatur commodi officiis libero consequuntur minima aperiam veniam ratione reiciendis sed, dolore officia ut et? Aliquam minima quidem magnam unde aspernatur nemo laudantium laboriosam laborum omnis quod aut nobis rem, maiores qui! Eum odio obcaecati similique. Optio obcaecati maxime, non sequi possimus illo officia odit eos incidunt eligendi facere adipisci nostrum rem aliquam deserunt laborum doloribus quae amet veritatis ratione quia eum provident minus recusandae. Quaerat molestias ipsa corrupti officia dolorum quod at aliquam temporibus odit ratione, itaque dolorem accusantium repellat. At repudiandae, id debitis sunt minus numquam perspiciatis. Quam dolore, aliquid sit commodi possimus veritatis? Nostrum corporis asperiores non voluptatem obcaecati iste labore est accusamus reprehenderit provident itaque, alias cupiditate impedit suscipit voluptates corrupti qui veritatis consectetur maiores, unde repellat commodi quis. Accusamus sapiente quo exercitationem, dolores ipsa soluta quae cumque ea itaque eligendi nam. Nihil autem nemo consequatur, consectetur aut soluta, optio officia quidem ad aperiam, vel eveniet reiciendis? Illo qui inventore suscipit itaque quas. Ducimus minus voluptate, animi expedita officia necessitatibus facere!</p>
            <img src="images/computer.jpg">
        </div>
        <div class="aboutContainer">
            <img src="images/team.jpg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet minima laboriosam ex. Hic nemo ea adipisci repudiandae molestias fugiat! Suscipit impedit quo maxime molestiae. Eveniet natus excepturi voluptas dolorum ducimus id quasi sapiente reiciendis doloribus, provident repellendus aliquid ratione vero nihil mollitia dolorem culpa nostrum aliquam illo ex vel quaerat possimus? Delectus rem dolorem quibusdam voluptates, at aspernatur commodi officiis libero consequuntur minima aperiam veniam ratione reiciendis sed, dolore officia ut et? Aliquam minima quidem magnam unde aspernatur nemo laudantium laboriosam laborum omnis quod aut nobis rem, maiores qui! Eum odio obcaecati similique. Optio obcaecati maxime, non sequi possimus illo officia odit eos incidunt eligendi facere adipisci nostrum rem aliquam deserunt laborum doloribus quae amet veritatis ratione quia eum provident minus recusandae. Quaerat molestias ipsa corrupti officia dolorum quod at aliquam temporibus odit ratione, itaque dolorem accusantium repellat. At repudiandae, id debitis sunt minus numquam perspiciatis. Quam dolore, aliquid sit commodi possimus veritatis? Nostrum corporis asperiores non voluptatem obcaecati iste labore est accusamus reprehenderit provident itaque, alias cupiditate impedit suscipit voluptates corrupti qui veritatis consectetur maiores, unde repellat commodi quis. Accusamus sapiente quo exercitationem, dolores ipsa soluta quae cumque ea itaque eligendi nam. Nihil autem nemo consequatur, consectetur aut soluta, optio officia quidem ad aperiam, vel eveniet reiciendis? Illo qui inventore suscipit itaque quas. Ducimus minus voluptate, animi expedita officia necessitatibus facere!</p>
        </div>
     
    </main>

    <footer>
        crud app &copy 2023: All Rights Reserved
    </footer>
      <script src="javascript/main.js"></script>
    
</body>
</html>