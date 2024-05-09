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
    <h1>List Users Page</h1>
    <?php
        include 'db.php';

        function sub_navigator() {
            return "
                <div>
                    <a href='list_users.php?tab=all_users'>List Users</a>
                    <a href='list_users.php?tab=checked_in_users'>List All Users checked-in Parkings</a>
                </div>
            ";
        };

        function render_all_users_table() {
            
            $list_users_sql = "select username, name, surname, phone, email, type from users where type = 'user';";

            $result = $GLOBALS['my_connection']->query($list_users_sql);

            echo "<table border=1>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                    </tr>";
                }
            }
            echo "</table>";
        }


        function render_checked_in_users() {

            $list_checked_in_users_sql = "select U.username, U.name, U.surname, U.phone, U.email, U.type, P.location_id, P.start_time, P.end_time, P.total_cost, P.status 
            
            from users U join parkings P on U.username= P.username where P.status = 'check-in' and type = 'user';";

            $result = $GLOBALS['my_connection']->query($list_checked_in_users_sql);

            echo "<table border=1>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Location ID</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $cost = $row[9] ? '$' . $row[9] : '-';
                    $end_time = $row[8] ? $row[8] : '-';

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                        <td>$end_time </td>
                        <td>$cost</td>
                        <td>$row[10]</td>
                    </tr>";
                }
            }
            echo "</table>";
        }

        if(isset($_SESSION['login'])){
            echo sub_navigator();
            if(isset($_GET['tab'])) {
                if($_GET['tab'] == 'all_users'){
                    render_all_users_table();
                } else {
                    render_checked_in_users();
                }
            } else {
                render_all_users_table();
            }

        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
    ?>
</body>
</html>