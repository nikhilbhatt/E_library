<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['user_type'] != 'admin') {
    header("location:/login");
}
$userlist = $app['database']->userList('reader');
$booklist = $app['database_book']->bookList();
$catlist = $app['categories']->categoryList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="Resources/CSS/Dashcards.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --> 

    <title> Admin Dashboard</title>
    <link rel="stylesheet" href="Resources/CSS/footer.css">
    <link rel="stylesheet" href="Resources/CSS/admindashboard.css">

</head>

<body style="background-color: rgba(101,157,189,0.4); ">

    <?php require "views/users/navbar.admin.view.php"; ?>
    <div class="foo">
        <div class="card-container ">
            <div class="img-container">
                <img src="Resources/Images/usericon.jpg" href="userlist" alt="not found">

            </div>

            <div class="user-info">
                <a href="userlist" style="color:white;">
                    <h3>Total Readers</h3>
                </a>

            <span>
                <h4 style="color:white;"><?php echo (count($userlist)); ?></h4>
            </span>

            </div>
        </div>
        <div class="card-container ">
            <div class="img-container">
                <img src="Resources/Images/bookicon.jpeg" alt="not found">
                <ul class="count">

                </ul>
            </div>

            <div class="user-info">
                <a href="booklist" style="color:white;">
                    <h3>Total Books</h3>
                </a>
                <span>
                <h4 style="color:white;"><?php echo (count($booklist)); ?></h4>
            </span>

            </div>
        </div>
        <div class="card-container ">
            <div class="img-container">
                <img src="Resources/Images/categoryicon.jpg" href="categories" alt="not found">
                <ul class="count">

                </ul>
            </div>

            <div class="user-info">
                <a href="categories" style="color:white;">
                    <h3>Total Categories</h3>
                </a>
                <span>
                <h4 style="color:white;"><?php echo (count($catlist)); ?></h4>
            </span>



            </div>
        </div>
    </div>




    <?php require "Resources/partials/footer.php" ?>
</body>

</html>