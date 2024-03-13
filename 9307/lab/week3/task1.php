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
            $newNum = strrev($num);
            $newString = "$newNum";
            $ans = '';
            $isPositive = $num >= 0;
            for($i = 0; $i < ($isPositive ? strlen($newString) : (strlen($newString) - 1)); $i++) {
                $ans .= $newString[$i] * 5;
            }
            $ans = (int) $ans;
            return $isPositive ? $ans : $ans * -1;
        }

        echo reverseNumber(-123) . "<br/>";
        echo reverseNumber(4533) . "<br/>";
        echo reverseNumber() . "<br/>";
        echo reverseNumber(213456592) . "<br/>";
        echo reverseNumber(-5) . "<br/>";
    ?>
</body>
</html>