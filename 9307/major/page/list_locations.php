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
        
        h3 a {
            color: red;
        }
        .div1{
            display: flex;
            justify-content: center;
            
        }
        .div1 a {
            margin-right: 8px;
        }
        .formDiv{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>List Locations Page</h1>
 
    <?php
        include 'db.php';
        include '../class/user.php';

        function render_list_table() {

            // list all locations
            if($_GET['tab'] === 'all') {
                $sql = "select * from locations;";
            } else {
                $sql = "select * from locations where current_available = 0";
            }
            
            $GLOBALS['user']->list_or_search_locations($GLOBALS['my_connection'], $_GET['tab'], $sql);

            if(isset($_GET['edit'])) {
                $location_id = $_GET['location_id'];
                $select_sql = "select * from locations where id = '$location_id'";

                try {
                    $result = $GLOBALS['my_connection']->query($select_sql);

                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <form method="post" action="list_locations.php?tab=all&edit=true&capacity='.$row[3].'&current_available='.$row[4].'&location_id='.$location_id.'"  >
                                <table>
                                    <tr>
                                        <td>
                                            Parking ID:
                                        </td>
                                        <td>
                                            <input type="text" name="id" id="" value="'.$row[0].'" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Location:
                                        </td>
                                        <td>
                                            <input type="text" name="location" id="" value="'.$row[1].'" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Description:
                                        </td>
                                        <td>
                                            <input type="text" name="description" id="" value="'.$row[2].'" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Parking spaces:
                                        </td>
                                        <td>
                                            <input type="text" name="capacity" id="" value="'.$row[3].'" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Cost per hour:
                                        </td>
                                        <td>
                                            <input type="text" name="cost" id="" value="'.$row[5].'" required>
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
                            </form>
                        ';
                        }
                    }

                }   catch (mysqli_sql_exception $e) {
                    echo 'Error: ' . $e->getMessage() . '!';
                }
            }

            if(isset($_POST['submit'])) {
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

                $id = $_GET['location_id'];
                $location = $_POST['location'];
                $description = $_POST['description'];
                $capacity = $_POST['capacity'];
                $cost = $_POST['cost'];
                $prev_capacity = $_GET['capacity'];
                $prev_avail = $_GET['current_available'];

                // edit location
                $admin->edit_location($GLOBALS['my_connection'], $id, $location, $description, $capacity, $cost, $prev_capacity, $prev_avail);

            }
        }

        
        function search_form() {
            return '<form action="list_locations.php?tab=search" method="post">
                        <label>Location ID: </label><input type="text" name="id" id="">
                        <label>Location: </label><input type="text" name="location" id="">
                        <label>Description: </label><input type="text" name="description" id="">
                        <input type="submit" value="search" name="search">
                </form>';
        }

        function render_search_table() {
            echo search_form();
            
            if(isset($_POST['search'])) {
                $id = $_POST['id'];
                $location = $_POST['location'];
                $description = $_POST['description'];

                // blur search for all locations
                if($id) {
                    if($location) {
                        if($description) {
                            $search_sql = "select * from locations where id like '%$id%' and location like '%$location%' and description like '%$description%';";
                        } else {
                            $search_sql = "select * from locations where id like '%$id%' and location like '%$location%';";
                        }
                    } else {
                        if($location) {
                            $search_sql = "select * from locations where id like '%$id%' and description like '%$description%';";
                        } else {
                            $search_sql = "select * from locations where id like '%$id%'";
                        }
                    }
                } else {
                    if($location) {
                        if($description) {
                            $search_sql = "select * from locations where location like '%$location%' and description like '%$description%';";
                        } else {
                            $search_sql = "select * from locations where location like '%$location%';";
                        }
                    } else {
                        if($description) {
                            $search_sql = "select * from locations where description like '%$description%';;";
                        } else {
                            $search_sql = "select * from locations;";
                        }
                    }
                }

                $GLOBALS['user']->list_or_search_locations($GLOBALS['my_connection'], $_GET['tab'], $search_sql);
            }
        }

        function subTab() {
            $newTab = $GLOBALS['user']->type === 'administrator' ? '<a href="list_locations.php?tab=full">List full Parking</a>' : '';

            return '   
            <div class="div1">
                <a href="list_locations.php?tab=all">List All Parking</a>
                '.$newTab.'
                <a href="list_locations.php?tab=search">Search Parking</a>
            </div>';
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

            echo subTab();


            if(isset($_GET['tab'])) {
                if($_GET['tab'] == 'all' || $_GET['tab'] == 'full'){
                    render_list_table();
                } else {
                    render_search_table();
                }
            } else {
                render_list_table();
            }

        } else {
            echo "<h3>Please login first " . "<a href='login.php'> Login</a></h3>";
        }

        echo '</div>';
    ?>
</body>
</html>