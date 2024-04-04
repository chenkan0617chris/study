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
    <a href="seller.php">Go to Seller page</a>
    <h2>Textbooks List</h2>
    <div style="display: flex;">
        <form style="margin: 16px" action="buyer.php" method="get">
            <span>Search:</span>
            <input type="text" name="TNo" id="">
            <input type="submit" name='submit' value="submit">
        </form>

        <form style="margin: 16px" action="buyer.php" method="post">
            <span>Add Your Interest</span>
            <table>
                <tr>
                    <td>name:</td>
                    <td>
                        <input type="text" name="name" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>phone:</td>
                    <td><input type="text" name="phone" id="" required></td>
                </tr>
                <tr>
                    <td>TNo:</td>
                    <td><input type="text" name="TNo" id="" required></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" id="" required></td>
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
    </div>

    <?php
        $GLOBALS['file_name'] = 'TextDirectory.txt';

        $GLOBALS['phone_pattern'] = '/^0[2-9]\d{8}$/';

        $GLOBALS['TNo_pattern'] = "/^[0-9]{4}-[a-zA-Z]{2}$/";

        echo "<div style='display: flex;'>";

        list_all_books();

        function list_all_books() {
            $content = file_get_contents($GLOBALS['file_name']);

            $list = json_decode($content, true);
    
            if($content) {
                render_table($list);
            }
        }

        function render_table($list) {
            echo "<ol>";
            foreach ($list as $key => $value) {
                echo "<li>";
                echo "<table>";
                foreach ($value as $key2 => $field) {
                    echo "<tr>";
                    echo "<td>". $key2.":</td>";
                    echo "<td>". $field."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</li>";
            }
            echo "</ol>";
        }


        if(isset($_GET['submit'])) {

            if(!preg_match($GLOBALS['TNo_pattern'], $_GET['TNo'])){
                echo 'TNo is invalid!';
                return;
            }

            $content = file_get_contents($file_name);

            if($content) {
                $decode_content = json_decode($content, true);

                $filter_array = array_filter($decode_content, function($item){
                    return $item['TNo'] === $_GET['TNo'];
                });

                if($filter_array) {
                    render_table($filter_array);
                } else {
                    echo '<p>Sorry, Can not find this book!</p>';
                }
            }
        }

        if(isset($_POST['submit'])) {
            $BuyersEOI = 'BuyersEOI.txt';

            $data = new stdClass();

            $data->name = $_POST['name'];
            $data->phone = $_POST['phone'];
            $data->TNo = $_POST['TNo'];
            $data->price = $_POST['price'];

            if(!preg_match($GLOBALS['phone_pattern'], $_POST['phone'])){
                echo 'Phone is invalid!';
                return;
            }

            if(!preg_match($GLOBALS['TNo_pattern'], $_POST['TNo'])){
                echo 'TNo is invalid!';
                return;
            }

            $book_list = file_get_contents($file_name);

            $decode_book_list = json_decode($book_list, true);

            $filter_book = array_filter($decode_book_list, function($item){
                return $item['TNo'] === $_POST['TNo'];
            });

            if(!$filter_book) {
                echo '<p>Sorry, Can not find this book</p>';
                return;
            }

            $content = file_get_contents($BuyersEOI);

            $open_file = fopen($BuyersEOI, 'a+');

            if(!$content) {
                $data_array = array($data);

                fwrite($open_file, json_encode($data_array));

            } else {

                file_put_contents($BuyersEOI, '');

                $decode_content = json_decode($content, true);

                array_push($decode_content, $data);

                fwrite($open_file, json_encode($decode_content));
            }

            fclose($open_file);

            echo 'Added your textbooks to the your interest list successfully!';
        }

        echo "</div>";
    ?>
</body>
</html>