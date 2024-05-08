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
            $user_id = $_SESSION['id'];

            $list_current_parkings_sql = "select P.id, P.location_id, L.location, P.start_time, P.status, L.cost, L.current_available
            from parkings P join locations L on P.location_id = L.id where P.status = 'check-in' and P.user_id = '$user_id';";

            $cur_parking_result = $GLOBALS['my_connection']->query($list_current_parkings_sql);

            if(mysqli_num_rows($cur_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
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
                        <td>$$row[5]/hour</td>
                        <td><a href='./check_out.php?check_out=true&id=$row[0]&start_time=$row[3]&cost=$row[5]&current_available=$row[6]&location_id=$row[1]'>Check Out</a></td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<h3>You do not have current parkings!</h3>';
            }
        }

        function render_table($sql) {
            $cur_parking_result = $GLOBALS['my_connection']->query($sql);
            $isPast = $_GET['tab'] === 'past';

            if(mysqli_num_rows($cur_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Location ID</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Cost</th>
                        '.$isPast ? '' : '<th>Operation</th>
                    </tr>';
                while($row = mysqli_fetch_array($cur_parking_result)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$$row[5]/hour</td>
                        ".$isPast ? '' : "<td><a href='./check_out.php?check_out=true&id=$row[0]&start_time=$row[3]&cost=$row[5]'>Check Out</a></td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo 'You do not have '.$_GET['tab'].' parkings!';
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
            $user_id = $_SESSION['id'];

            $list_past_parkings_sql = "select P.id, P.location_id, L.location, P.start_time, P.end_time, P.total_cost, P.status, L.cost 
            from parkings P join locations L on P.location_id = L.id where P.status = 'completed' and P.user_id = '$user_id';";

            $past_parking_result = $GLOBALS['my_connection']->query($list_past_parkings_sql);

            if(mysqli_num_rows($past_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
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
                        <td>$$row[5]</td>
                        <td>$row[6]</td>
                        <td>$$row[7]/hour</td>
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