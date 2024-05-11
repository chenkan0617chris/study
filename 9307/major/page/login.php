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

        form {
            background: white;
            padding: 32px;
            border-radius: 8px;
        }
        tr td:nth-child(1) {
            text-align: right;
        }

        tr td:nth-child(2) {
            text-align: left;
        }

        .content {
            background: transparent;
        }
        
        h2, h3{
            text-align: center;
         }
        .div1{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .div2{
            width: 400px;
            height: 450px;
            background: white;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    
    <?php
        include 'db.php';

        $hiddenForm = false;

        function render_login_form() {
            return '
            <div class="content">
                <form action="login.php" method="post">
                    <h2>
                        Easy Parking
                    </h2>
                    <h3>Login</h3>
                    <table>
                        <tr>
                            <td>
                                username:
                            </td>
                            <td>
                                <input type="text" name="username" id="" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                password:
                            </td>
                            <td>
                                <input type="password" name="password" id="" required>
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
                </form>
            </div>';
        }


        if(isset($_GET['logout'])) {
            $_SESSION = array();
        }

        if(isset($_SESSION['user'])) {
            $hiddenForm = true;
        } else {
            $hiddenForm = false;
        }

        if($hiddenForm) {
            $user_type = $_SESSION['user']['type'] == 'administrator' ? 'Administrator' : 'User';
            echo '<div class="div1"><div class="div2"><h2>Easy Parking</h2><p>'.$user_type.' ' . $_SESSION['user']['username'] . ' is logged in!' . '<a href="login.php?logout=true">log out</a></p></div></div>';
        } else {
            echo render_login_form();

            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                try {
                    $secured_password = md5($password);
    
                    $select_sql = "select * from users where username = '$username' and password = '$secured_password' ;";
    
                    $result = $GLOBALS['my_connection']->query($select_sql);
    
                    if(mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {

                            $_SESSION['user'] = $row;
    
                            $hiddenForm = true;
    
                            echo '<div class="snackbar green">login successful!</div>';
                        }
    
                    } else {
                        echo '<div class="snackbar red">username or Password incorrect! please try again!</div>';
                    }
    
                } catch (mysqli_sql_exception $e) {
                    echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
                }
            }
        }
    ?>
</body>
</html>