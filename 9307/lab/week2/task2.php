<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex">
    <?php
    function convertToFahrenheit($value) {
        return round(($value * 9 / 5) + 32, 1);
    }

    function convertToCelsius($value) {
        return round(($value - 32) / 9 * 5, 1);
    }

    function tableRender(bool $toCelsius){
        for($i = 0; $i <= 100; $i++) {
            echo "<tr>
                <td>$i</td>
                <td>", $toCelsius ? convertToCelsius($i) : convertToFahrenheit($i) ,"</td>
            </tr>";
        }
    }

    echo "<table border=1 style='margin-right: 20px'>
            <tr>
                <td>Fahrenheit</td>
                <td>Celsius</td>
            </tr>
            ", tableRender(true) ,"
    </table>";  

    echo "<table border=1>
            <tr>
                <td>Celsius</td>
                <td>Fahrenheit</td>
            </tr>
            ", tableRender(false) ,"
    </table>"; 
        
    ?>
</body>
</html>