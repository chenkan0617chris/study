<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('task1.html');

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];



            $fp = fopen($name . '.txt', 'w');

            fwrite($fp, $name . '\n');
            fwrite($fp, $description . '\n');
            fwrite($fp, $price . '\n');

            fclose($fp);
            
        }
        $arr = scandir('./');
        foreach ($arr as $key => $value) {
            echo $value;
        }



    ?>
</body>
</html>