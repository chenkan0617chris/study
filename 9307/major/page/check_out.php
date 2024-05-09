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
    <h1>Check-out Page</h1>
    <div>
        <a href="check_out.php?tab=current">Current parkings</a>
        <a href="check_out.php?tab=past">Past parkings</a>
    </div>
    <?php
        include 'db.php';
       
        if(isset($_SESSION['login'])){
            if(isset($_GET['tab']) && $_GET['tab'] == 'past') {
                render_past_parkings();
            } else {
                render_check_out();
                handle_check_out();
            }

        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }

        function render_check_out(){
            $username = $_SESSION['login'];
            if($_SESSION['type'] === 'administrator') {
                $list_current_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.status, L.cost, L.current_available
                from parkings P join locations L on P.location_id = L.id where P.status = 'check-in';";
            } else {
                $list_current_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.status, L.cost, L.current_available
                from parkings P join locations L on P.location_id = L.id where P.status = 'check-in' and P.username = '$username';";
            }

            $cur_parking_result = $GLOBALS['my_connection']->query($list_current_parkings_sql);

            if(mysqli_num_rows($cur_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Location ID</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Cost</th>
                        <th>Operation</th>
                    </tr>';
                while($row = mysqli_fetch_array($cur_parking_result)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$$row[6]/hour</td>
                        <td><a href='./check_out.php?check_out=true&id=$row[0]&start_time=$row[4]&cost=$row[6]&current_available=$row[7]&location_id=$row[2]'>Check Out</a></td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<h3>You do not have current parkings!</h3>';
            }
        }

        function handle_check_out() {
            if(isset($_GET['check_out'])) {
                $id = $_GET['id'];
                $cost = $_GET['cost'];
                $start_time = $_GET['start_time'];

                date_default_timezone_set('Australia/Sydney');

                $end_time = date('Y-m-d H:i:s');

                $time1 = new DateTime($start_time);
                $time2 = new DateTime($end_time);

                $hours = $time2->diff($time1)->h + 1;

                $price = $hours * $cost;

                $check_out_sql = "update parkings set status = 'completed', end_time = '$end_time', total_cost = $price where id = $id;";

                try {
                    $GLOBALS['my_connection']->query($check_out_sql);

                    $current_available = $_GET['current_available'] + 1;

                    $location_id = $_GET['location_id'];

                    $update_cur_ava_sql = "update locations set current_available = $current_available where id = '$location_id';";

                    try {
                        $GLOBALS['my_connection']->query($update_cur_ava_sql);

                        echo 'Check out successfully! The total Price is $'.$price.'.';
                    } catch (mysqli_sql_exception $e) {
                        echo 'Error: ' . $e->getMessage() . '!';
                    }
                    
                } catch (mysqli_sql_exception $e) {
                    echo 'Error: ' . $e->getMessage() . '!';
                }
            }
        }

        function render_past_parkings() {
            $username = $_SESSION['login'];

            if($_SESSION['type'] === 'administrator') {
                $list_past_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.end_time, P.total_cost, P.status, L.cost 
                from parkings P join locations L on P.location_id = L.id where P.status = 'completed';";
            } else {
                $list_past_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.end_time, P.total_cost, P.status, L.cost 
                from parkings P join locations L on P.location_id = L.id where P.status = 'completed' and P.username = '$username';";
            }

            $past_parking_result = $GLOBALS['my_connection']->query($list_past_parkings_sql);

            if(mysqli_num_rows($past_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Location ID</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Cost</th>
                    </tr>';
                while($row = mysqli_fetch_array($past_parking_result)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$$row[6]</td>
                        <td>$row[7]</td>
                        <td>$$row[8]/hour</td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<h3>You do not have past parkings!</h3>';
            }
        }
    ?>
</body>
</html>