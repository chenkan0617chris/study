<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Parking</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        td, th {
            padding: 8px;
        }

        table, form {
            margin: 16px 0;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>Check-in Page</h1>
    <?php
        include 'db.php';

        function check_in_form() {
            return '<form action="check_in.php" method="post">
                <label>Parking ID: </label>
                <input type="text" name="parking_id" id="" required/>
                <input type="submit" value="check in" name="checkin">
            </form>';
        }

        function render_user_check_in(){
            echo check_in_form();

            if(isset($_POST['checkin'])) {
                $id = $_SESSION['id'];
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
                                $check_in_sql = "insert into parkings(user_id, location_id, start_time, status) values ( $id, '$parking_id', '$start_time' , '$status');";

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
                                    echo 'Error: ' . $e->getMessage() . '!';
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
            if(isset($_GET['type'])) {
                if($_GET['type'] == 'listAll'){
                    render_user_check_in();
                } else {
                }
            } else {
                render_user_check_in();
            }
        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
    ?>
</body>
</html>