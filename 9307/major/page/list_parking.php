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
        }-
        *+.

        table, form {
            margin: 16px 0;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>List Parking Page</h1>
    <div>
        <a href="list_parking.php?tab=all">List All Parking</a>
        <a href="list_parking.php?tab=search">Search Parking</a>
    </div>
    <?php
        include 'db.php';

        function render_table($sql) {
            $isAll = $_GET['tab'] == 'all';
            $tab = $_GET['tab'];
            $result = $GLOBALS['my_connection']->query($sql);
            $th = $isAll ? "<th>Operation</th>" : "";


            echo "<table border=1>
                <tr>
                    <th>Location ID</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Current Available</th>
                    <th>Cost</th>
                    ".$th."
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $td = $isAll ? "<td><a href='./list_parking.php?tab=$tab&delete=true&location_id=$row[0]'>Delete</a></td>" : "";

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$$row[5]/hour</td>
                        ".$td ."
                    </tr>";
                }
            }
            echo "</table>";
        }

        function render_list_table() {

            
            $list_parking_sql = "select * from locations;";

            render_table($list_parking_sql);

            if(isset($_GET['delete'])) {

            }
        }

        
        function search_form() {
            return '<form action="list_parking.php?type=search" method="post">
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
                
                if($id) {
                    if($location) {
                        if($description) {
                            $search_sql = "select * from locations where id like '%$id%' and location like '%$location%' and description like '%$description%';";
                        } else {
                            $search_sql = "select * from locations where id = '$id' and location like '%$location%';";
                        }
                    } else {
                        if($location) {
                            $search_sql = "select * from locations where id = '$id' and description like '%$description%';";
                        } else {
                            $search_sql = "select * from locations where id = '$id'";
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
                
                render_table($search_sql);
            }
        }


        
        if(isset($_SESSION['login'])){
            if(isset($_GET['tab'])) {
                if($_GET['tab'] == 'all'){
                    render_list_table();
                } else {
                    render_search_table();
                }
            } else {
                render_list_table();
            }

        } else {
            echo "Please login first" . "<a href='login.php'>Login</a>";
        }
    ?>
</body>
</html>