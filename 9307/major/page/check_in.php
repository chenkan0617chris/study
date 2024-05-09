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
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>Check-in Page</h1>
    <?php
        include 'db.php';

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
                    
                    $input = $_SESSION['type'] == 'administrator' ? '<label>Username: </label><input type="text" name="username" id="" required/>': '';
                    return '<form action="check_in.php" method="post">
                        <label>Parking Location ID: </label>
                        '.$select_options
                        .$input.'<input type="submit" value="check in" name="checkin">
                    </form>';

                } else {
                    echo "<h1>There is no location exist currently! Please contact administrator to insert locations!</h1>";
                    return;
                }
            } catch (mysqli_sql_exception $e) {
                echo 'Error: ' . $e->getMessage() . '!';
            }

            
        }

        function render_check_in(){
            echo check_in_form();

            if(isset($_POST['checkin'])) {
                if(isset($_POST['username'])){
                    $username = $_POST['username'];
                } else {
                    $username = $_SESSION['login'];
                }
                $parking_id = $_POST['parking_id'];

                date_default_timezone_set('Australia/Sydney');
                $start_time = date('Y-m-d H:i:s');
                $status = 'check-in';

                $check_full_sql = "select current_available, cost from locations where id = '$parking_id';";

                try {
                    $check_full_result = $GLOBALS['my_connection']->query($check_full_sql);

                    if(mysqli_num_rows($check_full_result) > 0) {
                        while($row = mysqli_fetch_array($check_full_result)) {
                            if($row['current_available'] == 0) {
                                echo 'This parking location is full. Please choose another location!';
                                return;
                            } else {
                                    $check_in_sql = "insert into parkings(username, location_id, start_time, status) values ('$username', '$parking_id', '$start_time' , '$status');";
                                try {
                                    $GLOBALS['my_connection']->query($check_in_sql);

                                    $cur_avail = $row['current_available'] - 1;
                                    $update_current_available_sql = "update locations set current_available = $cur_avail where id = '$parking_id';";

                                    try {
                                        $GLOBALS['my_connection']->query($update_current_available_sql);
                                        $cost = $row['cost'];

                                        echo 'Check-in successfully! The cost is $'.$cost.' per hour and start from '.$start_time;

                                    } catch (mysqli_sql_exception $e) {
                                        echo 'Error: ' . $e->getMessage() . '!';
                                    }
                                    
                                } catch (mysqli_sql_exception $e) {
                                    echo 'Error: Invalid Username!';
                                }
                            }
                        }
                    }
                } catch (mysqli_sql_exception $e) {
                    echo 'Error: ' . $e->getMessage() . '!';
                }
            }
        }


        function render_admin_check_in() {

        }
        
        if(isset($_SESSION['login'])){
            render_check_in();
        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
    ?>
</body>
</html>