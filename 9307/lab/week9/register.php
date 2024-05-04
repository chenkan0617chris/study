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
        Register Page
    </h1>
    <form action="register.php" method="post">
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
                    name:
                </td>
                <td>
                    <input type="text" name="name" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit" name="submit">
                    <input type="reset" value="reset" name="reset">
                </td>
            </tr>
            <tr>
                <td>have account?</td>
                <td>
                    <a href="./login.php">Login</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
        function connect_to_mysql() {
            $connection = new mysqli('localhost', 'root', 'ck951717', 'fitnesscenter');

            return $connection;
        }

        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            try {
                $my_connection = connect_to_mysql();

                $secured_password = md5($password);
    
                $sql = $my_connection->prepare("Insert into members (username, name, password) values(?, ?, ?)");

                $sql->bind_param('sss', $username, $name, $secured_password);


                try {
                    $sql->execute();

                    echo 'register successfully!' . "<a href='login.php'>Go to login</a>";

                } catch (mysqli_sql_exception $e) {
                    echo 'Error: ' . $e->getMessage() . '!';
                }
                
            } catch(e) {
                echo 'error: cannot connect to database!';
            }
        }
    ?>
</body>
</html>