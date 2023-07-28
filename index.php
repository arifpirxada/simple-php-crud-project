<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link rel = "icon" href = "images/titleicon.png">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Note Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <input type="hidden" id="update-sno" name="update-sno">
                        <div class="mb-3">
                            <label for="editInputtitle" class="form-label">Title</label>
                            <input type="text" name="edit-title" class="form-control" id="editInputtitle"
                                aria-describedby="emailHelp">
                            <div id="titleHelp" class="form-text">Proceed to edit the note.</div>
                        </div>
                        <div class="mb-3">
                            <label for="editInputdescription" class="form-label">Description</label>
                            <textarea class="form-control" name="edit-description" id="editInputdescription"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <header>
        <nav>
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
        <div class="addNodeContainer">
            <form action="index.php" method="post" id="nodeForm">
                <label class="formLable" for="title">Title:</label>
                <input type="text" required placeholder="Enter the title" id="title" name="title">
                <label class="formLable" for="description">Description:</label>
                <textarea id="des" required placeholder="Enter the description" rows="4" cols="55"
                    name="description"></textarea>
                <button type="submit" class="addNodeBtn">Add Note</button>
            </form>

        </div>
        <?php
        include "dbConnect.php";
        $insertmodal = false;
        if (isset($_GET['delbool'])) {
            $sno = $_GET['delbool'];
            $sql = "DELETE FROM `notes` WHERE `notes`.`S. No` = $sno";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                echo 'sorry!, technical issue ' . mysqli_error($conn);
            }

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['update-sno'])) {
                $sno = $_POST['update-sno'];

                $edittitle = $_POST['edit-title'];
                $editdescription = $_POST["edit-description"];

                $sql1 = "UPDATE `notes` SET `Title` = '$edittitle', `Description` = '$editdescription' WHERE `notes`.`S. No` = $sno";
                $result1 = mysqli_query($conn, $sql1);

                if (!$result1) {
                    echo 'sorry!, technical issue ' . mysqli_error($conn);
                } else {

                }
            } else {
                $title = $_POST['title'];
                $description = $_POST["description"];
                $email = $_SESSION['email'];

                $sql = "INSERT INTO `notes` (`Title`, `Description`, `user_email`) VALUES ('$title', '$description', '$email')";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo 'sorry!, technical issue ' . mysqli_error($conn);
                } else {
                    $insertmodal = true;
                }
            }
        }

        if ($insertmodal == true) {
            echo '<div class="modall">
                        <div class="noteModal">
                            <img id="noteImg" src="images/cross.png">
                            <p>Note successfully added!</p>
                            <button class="btn1">Ok</button>
                        </div>
                      </div>';
        }

        ?>

        <hr>

        <div class="nodeList">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "dbConnect.php";
                    $useremail = $_SESSION['email'];
                    $sql2 = "SELECT * FROM `notes` WHERE `user_email` = '$useremail'";
                    $selected = mysqli_query($conn, $sql2);

                    $num = mysqli_num_rows($selected);
                    if ($num > 0) {
                        $sno = 1;
                        while ($row = mysqli_fetch_assoc($selected)) {
                            echo "<tr>
                            <td>" . $sno . "</td>
                            <td>" . $row['Title'] . "</td>
                            <td>" . $row['Description'] . "</td>
                            <td>
                            <button type='button' class='btn btn-sm btn-primary editbtn' id=" . $row['S. No'] . " data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>
                            <button type='button' class='btn btn-sm btn-primary deletebtn' id='r" . $row['S. No'] . "'>Delete</button>
                            </td>
                            </tr>";
                            $sno = $sno + 1;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

    <footer>
        crud app &copy 2023: All Rights Reserved
    </footer>
    <!-- for table -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> -->
    <!-- for table end -->
    <script src="javascript/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable()
        })
    </script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>

</html>