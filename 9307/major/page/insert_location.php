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
</head>
<body>
    <?php include 'navigator.php' ?>
    
    
    
    <?php
        include 'db.php';
        include '../class/user.php';

        function render_create_location_form() {
            return '<div class="content"><form action="insert_location.php" method="post">
            <h2>insert location Page</h2>
            <table>
                <tr>
                    <td>
                        Parking ID:
                    </td>
                    <td>
                        <input type="text" name="id" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Location:
                    </td>
                    <td>
                        <input type="text" name="location" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Description:
                    </td>
                    <td>
                        <input type="text" name="description" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Parking spaces:
                    </td>
                    <td>
                        <input type="number" name="capacity" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cost per hour:
                    </td>
                    <td>
                        <input type="number" name="cost" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="submit">
                    </td>
                    <td>
                        <input type="reset" value="reset">
                    </td>
                </tr>
                
            </table>
        </form></div>';
        }
        
        if(isset($_SESSION['user'])){

            if($_SESSION['user']['type'] == 'administrator') {

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

                echo render_create_location_form();

                if(isset($_POST['submit'])){

                    $id = $_POST['id'];
                    $location = $_POST['location'];
                    $description = $_POST['description'];
                    $capacity = $_POST['capacity'];
                    $cost = $_POST['cost'];

                    // call class Admin function insert_location()
                    $admin->insert_location($GLOBALS['my_connection'], $id, $location, $description, $capacity, $cost);
                }
                
            } else {
                echo "<h3>You are not administrator! No permission to access this page!</h3>";
            }
        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
    ?>
</body>
</html>