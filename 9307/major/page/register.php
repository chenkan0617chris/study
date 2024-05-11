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
        tr td:nth-child(1) {
            text-align: right;
        }

        tr td:nth-child(2) {
            text-align: left;
        }
        .content {
            background: transparent;
        }
    </style>
</head>
<body>
    <?php include 'navigator.php' ?>
    
    <div class="content">
        <form action="register.php" method="post">
            <h2>
                Easy Parking
            </h2>
            <h3>Register</h3>
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
    </div>
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

                $username_pattern = '/^[a-zA-Z0-9]{3,20}$/';

                $password_pattern = '/^[a-zA-Z0-9;,.!@#$%^&*()_+]{6,20}$/';

                $name_pattern = '/^[a-zA-Z]{1,30}$/';

                $phone_pattern = '/^0[2-9]\d{8}$/';

                $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

                if(!preg_match($username_pattern, $username)) {
                    echo "<span class='red'>The username must between 3 to 20 alphabetical and numbers!</span>";
                    return;
                }
                if(!preg_match($password_pattern, $_POST['password'])){
                    echo "<span class='red'>The password must between 6 to 20 alphabetical, numbers and special characters!</span>";
                    return;
                }

                if(!preg_match($name_pattern, $name) || !preg_match($name_pattern, $surname)){
                    echo "<span class='red'>Invalid Name or Surname</span>";
                    return;
                }
                if(!preg_match($phone_pattern, $phone)){
                    echo "<span class='red'>Invalid Phone number!</span>";
                    return;
                }

                if(!preg_match($email_pattern, $email)){
                    echo "<span class='red'>Invalid Email address!</span>";
                    return;
                }
    
                $register_sql = "insert into users (username, password, name, surname, phone, email, type) 
                values ('$username', '$password', '$name', '$surname', '$phone', '$email', '$type');";
                
                $GLOBALS['my_connection']->query($register_sql);
    
                echo 'Registered successfully!' . '<a href="./login.php">login</a>';
    
            }

        } catch (mysqli_sql_exception $e) {
            echo '<span class="red">Error: ' . $e->getMessage() . '!</span>';
        }

    ?>
</body>
</html>