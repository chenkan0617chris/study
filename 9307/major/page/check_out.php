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
        .subTab a {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>Check-out Page</h1>
    
    <?php
        include 'db.php';
        include '../class/user.php';
        echo "<div class='content'>";
        echo '<div class="subTab">
            <a href="check_out.php?tab=current">Current parkings</a>
            <a href="check_out.php?tab=past">Past parkings</a>
        </div>';

       
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
            if(isset($_GET['tab']) && $_GET['tab'] == 'past') {
                render_past_parkings();
            } else {
                render_check_out();
                handle_check_out();
            }

        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
        echo "</div>";

        function render_check_out(){
            $username = $_SESSION['user']['username'];
            if($_SESSION['user']['type'] === 'administrator') {
                $list_current_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.status, L.cost, L.current_available
                from parkings P join locations L on P.location_id = L.id where P.status = 'check-in';";
            } else {
                $list_current_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.status, L.cost, L.current_available
                from parkings P join locations L on P.location_id = L.id where P.status = 'check-in' and P.username = '$username';";
            }

            // call list current parking function
            $GLOBALS['user']->list_current_parkings($GLOBALS['my_connection'], $list_current_parkings_sql);

        }

        function handle_check_out() {
            if(isset($_GET['check_out'])) {
                $id = $_GET['id'];
                $cost = $_GET['cost'];
                $start_time = $_GET['start_time'];

                $GLOBALS['user']->check_out($GLOBALS['my_connection'], $id, $cost, $start_time);
            }
        }

        function render_past_parkings() {
            $username = $_SESSION['user']['username'];

            if($_SESSION['user']['type'] === 'administrator') {
                $list_past_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.end_time, P.total_cost, P.status, L.cost 
                from parkings P join locations L on P.location_id = L.id where P.status = 'completed';";
            } else {
                $list_past_parkings_sql = "select P.id, P.username, P.location_id, L.location, P.start_time, P.end_time, P.total_cost, P.status, L.cost 
                from parkings P join locations L on P.location_id = L.id where P.status = 'completed' and P.username = '$username';";
            }

            $GLOBALS['user']->list_past_parkings($GLOBALS['my_connection'], $list_past_parkings_sql);
        }
    ?>
</body>
</html>