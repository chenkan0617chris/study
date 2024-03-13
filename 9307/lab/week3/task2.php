<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function checkISBN(string $ISBN) {
            $pattern = "/ISBN' ' [0-9]{3}-[0-9]-[0-9]{2}-[0-9]{6}-[0-9]/";

            return preg_match($pattern, $ISBN);
        }

        echo checkISBN('ISBN 999-9-99-999999-9');
    ?>
</body>
</html>