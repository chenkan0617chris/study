<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = [
            "a" => array(1,2,3,4,5),
            "b" => array(1,2,3),
            "c" => array(1),
            "d" => array(1,2,3,4),
        ];

        sort($arr);

        foreach ($arr as $key => $subArr) {
            echo count($subArr);
        }
        echo "<br/>";
        print_r($arr)

    ?>
</body>
</html>