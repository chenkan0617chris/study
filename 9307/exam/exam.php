<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $file = 'test.txt';

        $open_file = fopen($file, 'r');

        $list = array();

        while(!feof($open_file)){
            $line = fgets($open_file);
            
            $arr = explode('#', $line);

            $code = $arr[0];
            echo $arr[0];
            $name = $arr[1];
            $description = $arr[2];
            
            $list[$code] = array();
            $list[$code]['name'] = $name;
            $list[$code]['description'] = $description;

        }

        // array_multisort(array_column($list, 'description'));

        print_r($list);

    ?>
</body>
</html>