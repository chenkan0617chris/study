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
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    <h1>insert location Page</h1>
    
    
    <?php
        include 'db.php';

        function render_create_location_form() {
            return '<form action="insert_location.php" method="post">
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
                        <input type="text" name="capacity" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cost per hour:
                    </td>
                    <td>
                        <input type="text" name="cost" id="" required>
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
        </form>';
        }

        
        if(isset($_SESSION['login'])){
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'administrator') {
                echo render_create_location_form();

                if(isset($_POST['submit'])){
                    try {
        
                        $id = $_POST['id'];
                        $location = $_POST['location'];
                        $description = $_POST['description'];
                        $capacity = $_POST['capacity'];
                        $cost = $_POST['cost'];
        
                        $create_location_sql = "insert into locations values('$id', '$location', '$description', '$capacity', '$capacity', '$cost');";
        
                        $GLOBALS['connection']->query($create_location_sql);
                        
                        echo "location created successfully!";
        
                    } catch (mysqli_sql_exception $e) {
                        echo 'Error: ' . $e->getMessage() . '!';
                    }
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