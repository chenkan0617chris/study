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
        $city = 'wollongong';
        $state = 'NSW';
        $city .= " " . $state;

        echo $city;

        $vegetable = 'carrot';

        $word = "this is a {$vegetable}s";
        
        echo ucwords($word); 

        print strlen($city);
    
        $stringA = 'woodworking project';

        echo substr($stringA, -7) . "<br/>\n";
        echo substr($stringA, -7) . "<br/>\n";


        $email = "my.email@gmail.com";

        echo strchr($email, '.') . "<br/>";

        $test = 'abcd';

        echo "where is the position: " . strpos($test, 'a') . '<br/>';

        echo str_replace('@', '$', $email) . '<br/>';

        $text_split = 'qwerty@example';

        $arr = explode('@', $text_split);

        $array1 = [1,2,3];

        echo "<pre>". print_r($arr) ."</pre>";


        // foreach ($arr as $text) {
        //     echo $text;
        // }
        
    ?>
</body>
</html>