
<?php


    $isAdmin = isset($_SESSION['user']) && $_SESSION['user']['type'] === 'administrator';
    // logged in
    if(isset($_SESSION['user'])) {
        // admin user
        if ($_SESSION['user']['type'] === 'administrator') {
            echo '
            <div class="nav">
                <div></div>
                <div class="left">
                    <a href="insert_location.php">Insert Location</a>
                    <a href="list_locations.php?tab=all">List Parking</a>
                    <a href="check_in.php">Check in</a>
                    <a href="check_out.php">Check out</a>
                    <a href="list_users.php?tab=all_users">List Users</a>
                </div>
                <div class="right">
                    <a href="login.php">Log out</a>
                </div>
            </div>';
        } else {
            // normal user
            echo '
            <div class="nav">
                <div></div>
                <div class="left">
                    <a href="list_locations.php?tab=all">List Parking</a>
                    <a href="check_in.php">Check in</a>
                    <a href="check_out.php">Check out</a>
                </div>
                <div class="right">
                    <a href="login.php">Log out</a>
                </div>
            </div>';
        }
    } else {
        echo '
        <div class="nav">
            <div></div>
            <div class="left">
                <a href="list_locations.php?tab=all">List Parking</a>
                <a href="check_in.php">Check in</a>
                <a href="check_out.php">Check out</a>
            </div>
            <div class="right">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </div>
        </div>';
    }

    // to do list


    // 5. sql加insert

    
