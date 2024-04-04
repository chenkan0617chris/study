<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preloved textbooks</title>
    <style>
        body {
            position: absolute;
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <a href="buyer.php">Go to Buyer page</a>
    <h2>Sell Your Textbooks</h2>
    <form action="seller.php" method="post">
        <table>
            <tr>
                <td>name:</td>
                <td><input type="text" name="name" id="" required></td>
            </tr>
            <tr>
                <td>phone:</td>
                <td><input type="text" name="phone" id="" required></td>
            </tr>
            <tr>
                <td>email:</td>
                <td><input type="text" name="email" id="" required></td>
            </tr>
            <tr>
                <td>TNo:</td>
                <td><input type="text" name="TNo" id="" required></td>
            </tr>
            <tr>
                <td>title:</td>
                <td><input type="text" name="title" id="" required></td>
            </tr>
            <tr>
                <td>author:</td>
                <td><input type="text" name="author" id="" required></td>
            </tr>
            <tr>
                <td>publisher:</td>
                <td><input type="text" name="publisher" id="" required></td>
            </tr>
            <tr>
                <td>publishing year:</td>
                <td><input type="number" name="publishing_year" id="" required></td>
            </tr>
            <tr>
                <td>description:</td>
                <td><input type="text" name="description" id="" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name='submit' value="submit">
                </td>
                <td>
                    <input type="reset" name='reset' value="reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
        $file_name = 'TextDirectory.txt';

        $GLOBALS['phone_pattern'] = '/^0[2-9]\d{8}$/';

        $GLOBALS['email_pattern'] = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";

        $GLOBALS['TNo_pattern'] = "/^[0-9]{4}-[a-zA-Z]{2}$/";

        $content = file_get_contents($file_name);

        if(isset($_POST['submit'])) {

            $data = new stdClass();

            $data->name = $_POST['name'];
            $data->phone = $_POST['phone'];
            $data->email = $_POST['email'];
            $data->TNo = $_POST['TNo'];
            $data->title = $_POST['title'];
            $data->author = $_POST['author'];
            $data->publisher = $_POST['publisher'];
            $data->publishing_year = $_POST['publishing_year'];
            $data->description = $_POST['description'];

            if(!preg_match($GLOBALS['email_pattern'], $_POST['email'])){
                echo 'Email is invalid!';
                return;
            }

            if(!preg_match($GLOBALS['phone_pattern'], $_POST['phone'])){
                echo 'Phone is invalid!';
                return;
            }

            if(!preg_match($GLOBALS['TNo_pattern'], $_POST['TNo'])){
                echo 'TNo is invalid!';
                return;
            }

            $open_file = fopen($file_name, 'a+');

            if(!$content) {
                $data_array = array($data);

                fwrite($open_file, json_encode($data_array));

            } else {

                file_put_contents($file_name, '');

                $decode_content = json_decode($content, true);

                array_push($decode_content, $data);

                fwrite($open_file, json_encode($decode_content));
            }

            fclose($open_file);
            echo 'Added your textbooks to the list successfully!';
        }
    ?>
</body>
</html>