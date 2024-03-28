<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // $file = '../week4/server.php';

        // chmod($file, 0777);

        // $perm = fileperms($file);

        // $perm = decoct($perm%01000);

        // echo $perm;

        $dir = '../';


        function scan_my_file($file) {
            
            if(scandir($file)) {    
                $my_dir = scandir($file);
                foreach ($my_dir as $file) {
                    echo scan_my_file($file);
                }
            }
        }

        scan_my_file($dir);
    
    ?>
</body>
</html>