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
            background: url('../images/smart-parking.jpeg') no-repeat;
            background-size: cover;
        }
        form {
            background: white;
            padding: 32px;
            border-radius: 8px;
        }
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'navigator.php' ?>
    
    <form action="register.php" method="post">
        <h1>
            Register Page
        </h1>
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" id="" required></td>
            </tr>
            <tr>
                <td>password: </td>
                <td><input type="password" name="password" id="" required></td>
            </tr>
            <tr>
                <td>name: </td>
                <td><input type="text" name="name" id="" required></td>
            </tr>
            <tr>
                <td>surname: </td>
                <td><input type="text" name="surname" id="" required></td>
            </tr>
            <tr>
                <td>phone: </td>
                <td><input type="text" name="phone" id="" required></td>
            </tr>
            <tr>
                <td>email: </td>
                <td><input type="text" name="email" id="" required></td>
            </tr>
            <tr>
                <td>User Type: </td>
                <td>
                    <select name="type" id="" required>
                        <option value="administrator">Administrator</option>
                        <option value="user">User</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
                <td><input type="reset" value="reset"></td>
            </tr>
        </table>
    </form>
    <?php include '../class/user.php' ?>
    <?php
        include 'db.php';

        try {
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $phone = $_POST['phone']; 
                $email = $_POST['email'];
                $type = $_POST['type'];

                $current_user = new Administrator(0, $username, $password, $name, $surname, $phone, $email, $type);

    
                $register_sql = "insert into users (username, password, name, surname, phone, email, type) 
                values ('$username', '$password', '$name', '$surname', '$phone', '$email', '$type');";
                
                $GLOBALS['my_connection']->query($register_sql);
    
                echo 'Registered successfully!' . '<a href="./login.php">login</a>';
    
            }

        } catch (mysqli_sql_exception $e) {

            echo 'Error: ' . $e->getMessage() . '!';
        }

    ?>
</body>
</html>