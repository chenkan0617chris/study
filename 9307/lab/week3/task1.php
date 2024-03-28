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
        function reverseNumber(int $num = 0): int {
            $isPositive = $num >= 0;

            $newNum = (int) strrev($isPositive ? $num : $num * -1);

            return $isPositive ? $newNum * 5 : $newNum * -5;

        }

        echo reverseNumber(-123) . "<br/>";
        echo reverseNumber(90) . "<br/>";
        echo reverseNumber() . "<br/>";
        echo reverseNumber(200) . "<br/>";
        echo reverseNumber(-5) . "<br/>";
    ?>
</body>
</html>