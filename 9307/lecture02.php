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
    function add(...$args) {
        $temp = 0;
        foreach ($args as $key => $value) {
            $temp += $value;
        }

        return $temp;
    }


    $sum = add(1,2,3);
    echo "sum = $sum";
    ?>
    
</body>
</html>