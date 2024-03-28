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
            $pattern = "/^ISBN [0-9]{3}-[0-9]-[0-9]{2}-[0-9]{6}-[0-9]{1}$/";
            $result = preg_match($pattern, $ISBN);
            if ($result === 1) {
                echo $ISBN . "is a valid ISBN<br/>";
            } else {
                echo $ISBN . "is not a valid ISBN<br/>";
            }
        }

        $ISBNList = [
            'ISBN 991-2-23-932829-0', 
            'ISBN sdf-2-23-932829-0', 
            '23 991-2-23-932829-0', 
            'ISBN991-2-23-932829-0', 
            'ISBN 991-2-23-932829-34', 
            'ISBN 991-2-23-34df23-0', 
            'ISBN 991-4-23-566734-0',
            'ISBB 2355-2-23-312322-4', 
            'ISBN 2991-223-23-932829-0', 
            'ISBN 9912-23932829-0'
        ];

        foreach($ISBNList as $item) {
            checkISBN($item);
        }
    ?>
</body>
</html>