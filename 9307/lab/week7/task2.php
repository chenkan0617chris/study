<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="task2.php" method="post">
        <table>
            <tr>
                <td>From: </td>
                <td>
                    <select name="from">
                        <option value="Berlin">Berlin</option>
                        <option value="Moscow">Moscow</option>
                        <option value="Paris">Paris</option>
                        <option value="Prague">Prague</option>
                        <option value="Rome">Rome</option>
                    </select>  
                </td>
            </tr>
            <tr>
                <td>to: </td>
                <td>
                  <select name="to">
                    <option value="Berlin">Berlin</option>
                    <option value="Moscow">Moscow</option>
                    <option value="Paris">Paris</option>
                    <option value="Prague">Prague</option>
                    <option value="Rome">Rome</option>
                  </select>  
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit" name="submit">
                    <input type="reset" value="reset" name="reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
        $map = array(
            "Berlin" => array(
                "Berlin" => 0,
                "Moscow" => 1907.99,
                "Paris" => 876.96,
                "Prague" => 280.34,
                "Rome" => 1181.67 
            ),
            "Moscow" => array(
                "Berlin" => 1607.99,
                "Moscow" => 0,
                "Paris" => 2484.92,
                "Prague" => 1664.04,
                "Rome" => 2374.26 
            ),
            "Paris" => array(
                "Berlin" => 876.96,
                "Moscow" => 2484.92,
                "Paris" => 0,
                "Prague" => 885.38,
                "Rome" => 1105.76 
            ),
            "Prague" => array(
                "Berlin" => 280.34,
                "Moscow" => 1664.04,
                "Paris" => 885.38,
                "Prague" => 0,
                "Rome" => 922 
            ),
            "Rome" => array(
                "Berlin" => 1181.67,
                "Moscow" => 2374.26,
                "Paris" => 1105.76,
                "Prague" => 922,
                "Rome" => 0 
            ),
        );
        if(isset($_POST['submit'])){
            $from = $_POST['from'];
            $to = $_POST['to'];
            try {
                $distance = $map[$from][$to];
                echo "The distance between $from and $to is $distance";
            } catch (\Exception $e) {
                echo $e;
            }
        }
        
    ?>
</body>
</html>