<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="upload.php" method="post" enctype='multipart/form-data'>
        <span>File to upload</span>
        <input type="hidden" name="MAX_FILE_SIZE" value="500000" /><br />
        <input type="file" name="new_file">
        <input type="submit" name='submit' value="Upload">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $uploadFile = $_FILES['new_file'];
            if(isset($uploadFile)){
                echo "<pre>";
                echo print_r(($uploadFile));
                echo "</pre>";
                echo '<br /><br />';
                if(move_uploaded_file($uploadFile['tmp_name'], './' . $uploadFile['name'])){
                    echo 'uploaded successfully';
                }
            }
        }
    ?>
</body>
</html>