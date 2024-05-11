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
        input, select {
            margin-right: 8px;
        }
        select {
            width: 140px;
        }
        h3 a {
            color: red;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>Check-in Page</h1>
    <?php
        include 'db.php';
        include '../class/user.php';

        function check_in_form() {
            // fetch all locations from the database
            $fetch_locations_sql = "select id from locations";

            try {
                $result = $GLOBALS['my_connection']->query($fetch_locations_sql);

                if(mysqli_num_rows($result) > 0) {
                    $select_options = '<select name="parking_id">';

                    while($row = mysqli_fetch_array($result)) {
                        $select_options .=  '<option value="'.$row[0].'">'.$row[0].'</option>';
                    }
                    $select_options .= '</select>';
                    
                    $input = $_SESSION['user']['type'] == 'administrator' ? '<label>Username: </label><input type="text" name="username" id="" required/>': '';
                    return '<form action="check_in.php" method="post">
                        <label>Parking Location ID: </label>
                        '.$select_options
                        .$input.'<input type="submit" value="check in" name="checkin">
                    </form>';

                } else {
                    echo "<h3>There is no location exist currently! Please contact administrator to insert locations!</h3>";
                    return;
                }
            } catch (mysqli_sql_exception $e) {
                echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
            }

            
        }

        function render_check_in(){
            echo check_in_form();

            if(isset($_POST['checkin'])) {
                if(isset($_POST['username'])){
                    $username = $_POST['username'];
                } else {
                    $username = $_SESSION['user']['username'];
                }

                // call check in function
                $GLOBALS['user']->check_in($GLOBALS['my_connection'], $username, $_POST['parking_id']);
            }
        }

        echo "<div class='content'>";
        if(isset($_SESSION['user'])){
            // new a User instance
            $GLOBALS['user'] = new User(
                $_SESSION['user']['id'],
                $_SESSION['user']['username'],
                $_SESSION['user']['password'],
                $_SESSION['user']['name'],
                $_SESSION['user']['surname'],
                $_SESSION['user']['phone'],
                $_SESSION['user']['email'],
                $_SESSION['user']['type'],
            );
            
            render_check_in();
        } else {
            echo "<h3>Please login first" . "<h3><a href='login.php'>Login</a></h3></h3>";
        }
        echo '</div>';
    ?>
</body>
</html>