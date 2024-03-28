<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function password_check(string $password) {

            if(fail_match("/[0-9]+/", $password)) {
                echo "Password: $password" . "the password is missing one number.<br/>";
            }
            else if(fail_match("/[a-z]+/", $password)) {
                echo "Password: $password" . "the password is missing one lowercase letter.<br/>";
            }
            else if(fail_match("/[A-Z]+/", $password)) {
                echo "Password: $password" . "the password is missing one uppercase letter.<br/>";
            }
            else if(!fail_match("/\s+/", $password)) {
                echo "Password: $password" . "the password has spaces.<br/>";
            }
            else if(fail_match("/\W+/", $password)) {
                echo "Password: $password" . "the password is missing one special character.<br/>";
            }
            else if(fail_match("/^\S{8, 16}$/", $password)) {
                echo "Password: $password" . "the password should be between 8 and 16 characters long.<br/>";
            } else {
                echo "Password: $password" . "the password is strong.<br/>";
            }
        }

        function fail_match(string $pattern, string $password) {
            return !preg_match($pattern, $password);
        }

        $password_array = [
            'password',
            'password1',
            'passworD1',
            'passworD1 ',
            'passwo+rD1 ',
            'p1L++++p1L++++++p1L++++++',
            'passwo+rD1qwewerwerwerwerwerwer',
            '1aK.123sdfasd23r2342sf'
        ];

        foreach ($password_array as $password) {
            password_check($password);
        }
    ?>
</body>
</html>