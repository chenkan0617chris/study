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
    <h1>
        Login Page
    </h1>
    <?php
        include 'db.php';

        $hiddenForm = false;

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


        if(isset($_GET['logout'])) {
            $_SESSION = array();
        }

        if(isset($_SESSION['login'])) {
            $hiddenForm = true;
        } else {
            $hiddenForm = false;
        }

        if($hiddenForm) {
            $user_type = $_SESSION['type'] == 'administrator' ? 'Administrator' : 'User';
            echo $user_type.' ' . $_SESSION['login'] . ' is logged in!' . '<a href="login.php?logout=true">log out</a>';
        } else {
            echo render_login_form();

            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                try {
                    $secured_password = md5($password);
    
                    $select_sql = "select id, username, password, type from users where username = '$username' and password = '$secured_password' ;";
    
                    $result = $GLOBALS['my_connection']->query($select_sql);
    
                    if(mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {
    
                            $_SESSION['login'] = $row['username'];
    
                            $_SESSION['id'] = $row['id'];
    
                            $_SESSION['type'] = $row['type'];
    
                            $hiddenForm = true;
    
                            echo 'login successful!';
                        }
    
                    } else {
                        echo 'username or Password incorrect! please try again!';
                    }
    
                } catch (mysqli_sql_exception $e) {
                    echo 'Error: ' . $e->getMessage() . '!';
                }
            }
        }
    ?>
</body>
</html>