<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = [1,2,3];
        echo array_shift($arr) . '<br/>';
        echo "<pre>\n";
        print_r($arr);
        echo "</pre>\n";

        array_unshift($arr, 5);
        echo "<pre>\n";
        print_r($arr);
        echo "</pre>\n";

        echo array_pop($arr) . '<br/>';
        echo "<pre>\n";
        print_r($arr);
        echo "</pre>\n";
        

        array_splice($arr, 1, 1, ['a', 'a', 'b', 'c', 'd', 'e', 'f']);
        echo "<pre>\n";
        print_r($arr);
        echo "</pre>\n";


        $new_arr = array_unique($arr);
        echo "<pre>\n";
        print_r($new_arr);
        echo "</pre>\n";

        $fk_arr = array(
            "name" => "kan",
            "age" => 18
        );
        echo "<pre>\n";
        print_r($fk_arr);
        echo "</pre>\n";
        
        $fk_arr[10] = 'asd';
        $fk_arr[] = '24';
        $fk_arr[] = '12';

        echo "<pre>\n";
        print_r($fk_arr);
        echo "</pre>\n";

        foreach ($fk_arr as $key => $value) {
            echo $key. $value .'<br/>';
        
        };

        if(in_array('18', $fk_arr)) {
            echo 'existing';
        } else {
            echo 'not existing';
        }
        echo '<br/>';

        if(array_key_exists('11', $fk_arr)) {
            echo 'existing';
        } else {
            echo 'not existing';
        }

        $arr_keys = array_keys($fk_arr);

        echo "<pre>\n";
        print_r($arr_keys);
        echo "</pre>\n";

        $new_arr_keys = array_slice($arr_keys, 0, 2);
        echo "<pre>\n";
        print_r($new_arr_keys);
        echo "</pre>\n";
        
        $arr_keys += $fk_arr;
        echo "<pre>\n";
        print_r($arr_keys);
        echo "</pre>\n";

        echo '---------------------------array-------------------------------------<br/>';

        
        

    ?>
</body>
</html>