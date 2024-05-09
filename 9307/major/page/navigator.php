
<?php


    $isAdmin = isset($_SESSION['type']) && $_SESSION['type'] === 'administrator';

    if($isAdmin) {
        echo '<div>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="insert_location.php">Insert Location</a>
        <a href="list_locations.php?tab=all">List Parking</a>
        <a href="check_in.php">check_in</a>
        <a href="check_out.php">check_out</a>
        <a href="list_users.php?tab=all_users">list_users</a>
        </div>';
    } else {
        echo '<div>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="list_locations.php?tab=all">List Parking</a>
        <a href="check_in.php">check_in</a>
        <a href="check_out.php">check_out</a>
        </div>';
    }

    // to do list

    // 2. 正则验证输入

    // 3. admin能够list currently full locations

    
