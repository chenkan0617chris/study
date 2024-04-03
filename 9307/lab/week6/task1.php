<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preloved textbooks</title>
</head>
<body>
    <h3>Preloved Textbooks</h3>
    <form action="task1.php" method="post">
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
                <td><input type="text" name="publishing_year" id="" required></td>
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


        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $TNo = $_POST['TNo'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publisher = $_POST['publisher'];
            $publishing_year = $_POST['publishing_year'];
            $description = $_POST['description'];

            $open_file = fopen($file_name, 'a+');

            fwrite($open_file, 'Name: ' . $name . '<br/>');
            fwrite($open_file, 'Description: ' . $description . '<br/>');
            fwrite($open_file, 'phone: ' . $phone . '<br/>');
            fwrite($open_file, 'email: ' . $email . '<br/>');
            fwrite($open_file, 'TNo: '. $TNo . '<br/>');
            fwrite($open_file, 'title: ' . $title . '<br/>');
            fwrite($open_file, 'author'. $author . '<br/>');
            fwrite($open_file, 'publisher: ' . $publisher . '<br/>');
            fwrite($open_file, 'publishing_year: '. $publishing_year . '<br/>');
            fwrite($open_file, '----------------------------------------------------------------<br/>');

            fclose($open_file);
            //$_POST = array();
        }

        $content = file_get_contents($file_name);

        echo '<pre>'. $content .'</pre>';
    ?>
</body>
</html>