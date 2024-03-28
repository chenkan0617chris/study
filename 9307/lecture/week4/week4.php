<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "
        <form method='post' action='server.php'>
            <input type='text' name='first_name'><br/>
            <input type='text' name='last_name'><br/>
            <input type='submit' name='submit'>
            <input type='reset' name='reset'>
        </form>
    "
    ?>
</body>
</html>