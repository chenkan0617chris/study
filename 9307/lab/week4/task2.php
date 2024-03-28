<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php include("task2-form.html")?> -->

    <?php
        $display = true;
        
        if(isset($_POST["submit"])) {
            $amount = $_POST["amount"];
            $rate = $_POST["rate"];
            $year = $_POST["years"];
            if(is_numeric($amount) && is_numeric($rate) && is_numeric($year)) {
                calculate_payment($amount, $rate, $year);
                echo "<br/><a href='task2.php'>try again!</a>";
                $display = false;
            } else {
                echo "Error: please enter a valid value";
                $display = true;
            }
        }
        if($display) {
            display_form();
        }

        function display_form() {
            echo '
                <form action="task2.php" method="post">
    <table>
        <tr>
            <td>
                <label>Amount of Mortgage: </label>
            </td>
            <td>
                <input type="text" name="amount" id="" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>Interest Rate: </label>
            </td>
            <td>
                <input type="text" name="rate" id="" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>Numbers of Years: </label>
            </td>
            <td>
                <input type="text" name="years" id="" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="calculate">
            </td>
            <td>
                <input type="reset" name="reset" value="clear">
            </td>
        </tr>
    </table>
</form>';
        }
        
        function calculate_payment(int $amount, int $rate, int $year) {
            echo "Monthly Payment: " . $amount * $rate / (1-(1/(1+$rate) ** pow($year, 12)));
        }
    ?>
</body>
</html>