<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connection = new mysqli('localhost', 'root', 'ck951717', 'CSIT9307');

        // $pre_sql = $connection->prepare('insert into orders (price, order_date) values (?, ?) ');

        // $pre_sql->bind_param('is', $price, $date);

        // $price = 100;
        // $date = '2024-04-30';

        // $pre_sql->execute();

        // echo 'inserted';

        $select_sql = 'select price, order_date from orders';

        $pre_select_sql = $connection->prepare($select_sql);

        $pre_select_sql->execute();

        $pre_select_sql->bind_result($col1, $col2);

        while($pre_select_sql->fetch()){
            echo $col1 . $col2 . '<br />';
        }

        $connection->close();
        
    ?>
</body>
</html>