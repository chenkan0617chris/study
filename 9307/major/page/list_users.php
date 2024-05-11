<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Parking</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .subTab a{
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>List Users Page</h1>
    <?php
        include 'db.php';
        include '../class/user.php';

        function sub_navigator() {
            return "
                <div class='subTab'>
                    <a href='list_users.php?tab=all_users'>List Users</a>
                    <a href='list_users.php?tab=checked_in_users'>List All Users checked-in Parkings</a>
                </div>
            ";
        };

        echo "<div class='content'>";

        if(isset($_SESSION['user']) && $_SESSION['user']['type'] === 'administrator'){
            echo sub_navigator();
            // new an admin instance
            $admin = new Administrator(
                $_SESSION['user']['id'],
                $_SESSION['user']['username'],
                $_SESSION['user']['password'],
                $_SESSION['user']['name'],
                $_SESSION['user']['surname'],
                $_SESSION['user']['phone'],
                $_SESSION['user']['email'],
                $_SESSION['user']['type'],
            );

            if(isset($_GET['tab'])) {
                if($_GET['tab'] == 'all_users'){
                    $admin->list_users($GLOBALS['my_connection']);
                } else {
                    $admin->list_all_checked_in_users($GLOBALS['my_connection']);
                }
            } else {
                $admin->list_users($GLOBALS['my_connection']);
            }

        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }

        echo "</div>";
    ?>
</body>
</html>