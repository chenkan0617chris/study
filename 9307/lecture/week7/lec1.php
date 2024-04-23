<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="lec1.php" method="post">
        <span>first name: <input type="text" name="name[]" id=""></span>
        <span>last name: <input type="text" name="name[]" id=""></span>
        <input type="submit" value="submit" name="submit">
    </form> -->

    <?php
        // if(isset($_POST['submit'])) {
        //     print_r($_POST['name']);
        // }

        // $str1 = 'asd';

        // $str2 = 'asd';

        // if(strcasecmp($str1, $str2) === 0) {
        //     echo 'same';
        // } else {
        //     echo 'different';
        // }


        function cube($num){
            return $num ** 3;
        }

        $arr = [1,2,3];

        $new_arr = array_map('cube', $arr);

        print_r($new_arr)

        
        
    
    ?>
</body>
</html>