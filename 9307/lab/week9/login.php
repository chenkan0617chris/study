<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Center</title>
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
    <div>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="enrolment.php">Enrolment</a>
        <a href="queries.php">Queries</a>
    </div>
    <h1>
        Login Page
    </h1>
    <?php

        $displayForm = true;
        function render_login_form() {
            return '<form action="login.php" method="post">
            <table>
                <tr>
                    <td>
                        username:
                    </td>
                    <td>
                        <input type="text" name="username" id="">
                    </td>
                </tr>
                <tr>
                    <td>
                        password:
                    </td>
                    <td>
                        <input type="password" name="password" id="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="submit">
                    </td>
                    <td>
                        <input type="reset" value="reset" name="reset">
                    </td>
                </tr>
                <tr>
                    <td>No account?</td>
                    <td>
                        <a href="./register.php">Register</a>
                    </td>
                </tr>
            </table>
        </form>';

        }

        function connect_to_mysql() {
            $connection = new mysqli('localhost', 'root', 'ck951717', 'fitnesscenter');

            return $connection;
        }

        if(isset($_GET['logout'])) {
            $_SESSION = array();
        }

        if(isset($_SESSION['login'])) {
            $displayForm =false;
        } else {
            $displayForm = true;
        }

        if($displayForm){
            echo render_login_form();

            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                try {
                    $my_connection = connect_to_mysql();
    
                    $select_sql = "select id, username, password from members where username = '$username';";
    
                    $result = $my_connection->query($select_sql);
    
                    if(mysqli_num_rows($result) > 0) {
                        $secured_password = md5($password);
    
                        while ($row = mysqli_fetch_assoc($result)) {
    
                            if($secured_password == $row['password']){
    
                                $_SESSION['login'] = $row['username'];
    
                                $_SESSION['id'] = $row['id'];

                                $displayForm =false;

                                echo 'login successful! ' . '<a href="enrolment.php">Go to enrol!</a>';;
                            } else {
                                echo 'username or Password incorrect! please try again!';
                            }
                        }
    
                    } else {
                        echo 'invalid username! please try again!';
                    }
    
                } catch(e) {
                    echo 'error: cannot connect to database!';
                }
            }
        } else {
            echo 'User ' . $_SESSION['login'] . ' is logged in!' . '<a href="login.php?logout=true">log out</a>';
        }
    ?>
</body>
</html>