<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modify_file.php" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" name="description" id=""></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" name='submit' value="submit"></td>
                <td><input type="reset" value="reset"></td>
            </tr>
        </table>
    </form>

    <?php
        $file_name = 'Book A.txt';

        if(isset($_POST['submit'])){
            if(isset($_POST['name']) && $_POST['description'] && $_POST['price']){
                echo 'start<br/>';
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $open_file = fopen($file_name, 'a+');

                fwrite($open_file, 'Name: ' . $name . '<br/>');
                fwrite($open_file, 'description: ' . $description . '<br/>');
                fwrite($open_file, 'price: ' . $price . '<br/>');

                fclose($open_file);

                echo 'added!<br/>';
            }
        }


        if(is_file($file_name)){
            $content = file_get_contents($file_name);

            echo $content;
        }
    ?>
</body>
</html>