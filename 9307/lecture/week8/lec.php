<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        try {
            $connection = new mysqli('localhost', 'root', 'ck951717', 'CSIT9307');

            $sql = 'select * from orders;';
    
            $result = $connection -> query($sql);
            echo mysqli_field_count($connection) . " fields in each row";
            echo "<br/>";
    
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);   
                    foreach($row as $index => $item) {
                        echo $index . ":" . $item . "<br/>";
                    }
                }
            } else {
                echo '0 result';
            }
        } catch (mysqli_sql_exception $e) {
            die($e->getCode() . ": " . $e->getMessage());
        }   finally {
            $connection->close();

            echo "disconnected";
        }


        

    
    ?>
</body>
</html>