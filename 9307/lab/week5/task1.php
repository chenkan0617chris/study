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

            fwrite($fp, 'Name:' . $name . '<br/>');
            fwrite($fp, 'description:' . $description . '<br/>');
            fwrite($fp, 'price:' . $price . '<br/>');

            fclose($fp);
            
        }

        $arr = scandir('./');
        foreach ($arr as $key => $value) {
            if($value !== '.' && $value !== '..') {
                if(str_contains($value, '.txt')) {
                    $content = file_get_contents($value);

                    echo '<pre>';
                    echo $content . '<br/>';
                    echo '</pre>';



                   
                }
            }
        }



    ?>
</body>
</html>