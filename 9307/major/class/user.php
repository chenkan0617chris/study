<?php
    class User {
        public int $id;
        public string $username;
        public string $password;
        public string $name;
        public string $surname;
        public string $phone;
        public string $email;
        public string $type;

        public function __construct(int $id, string $username, string $password, string $name, string $surname, string $phone, string $email, string $type) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->name = $name;
            $this->surname = $surname;
            $this->phone = $phone;
            $this->email = $email;
            $this->type = $type;
        }

        // combine list locations with search locations
        public function list_or_search_locations(mysqli $conn, string $tab, string $sql) {

            // tab == 'all' means list all locations
            // tab == 'search' means search all locations
            $isAll = $tab == 'all' || $tab == 'full';

            $result = $conn->query($sql);
            $isAdmin = $this->type === 'administrator';
            $th = $isAll && $isAdmin ? "<th>Operation</th>" : "";

            echo "<div style='display: flex; justify-content: center'><table border=1>
                <tr>
                    <th>Location ID</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Current Available</th>
                    <th>Cost</th>
                    ".$th."
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $td = $isAll && $isAdmin ? "<td><a href='./list_locations.php?tab=$tab&edit=true&location_id=$row[0]'>Edit</a></td>" : "";

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$$row[5]/hour</td>
                        ".$td ."
                    </tr>";
                }
            }
            echo "</table></div>";
        }


        public function check_in(mysqli $conn, string $username, string $parking_id) {
 
            date_default_timezone_set('Australia/Sydney');
            $start_time = date('Y-m-d H:i:s');
            $status = 'check-in';

            $check_full_sql = "select current_available, cost from locations where id = '$parking_id';";

            try {
                $check_full_result = $conn->query($check_full_sql);

                if(mysqli_num_rows($check_full_result) > 0) {
                    while($row = mysqli_fetch_array($check_full_result)) {
                        if($row['current_available'] == 0) {
                            echo '<div class="snackbar red">Error: This parking location is full. Please choose another location!</div>';
                            return;
                        } else {
                                $check_in_sql = "insert into parkings(username, location_id, start_time, status) values ('$username', '$parking_id', '$start_time' , '$status');";
                            try {
                                $conn->query($check_in_sql);

                                $cur_avail = $row['current_available'] - 1;
                                $update_current_available_sql = "update locations set current_available = $cur_avail where id = '$parking_id';";

                                try {
                                    $conn->query($update_current_available_sql);
                                    $cost = $row['cost'];
                                    echo '<div class="snackbar green">Check-in successfully! The cost is $'.$cost.' per hour and start from '.$start_time.'</div>';


                                } catch (mysqli_sql_exception $e) {
                                    echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
                                }
                                
                            } catch (mysqli_sql_exception $e) {
                                echo '<div class="snackbar red">Error: Invalid Username!</div>';
                            }
                        }
                    }
                }
            }catch (mysqli_sql_exception $e) {
                echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
            }
        }

        public function check_out(mysqli $conn, int $parking_id, int $cost, string $start_time ) {
            date_default_timezone_set('Australia/Sydney');

            $end_time = date('Y-m-d H:i:s');

            $time1 = new DateTime($start_time);
            $time2 = new DateTime($end_time);

            $hours = $time2->diff($time1)->h + 1;

            $price = $hours * $cost;

            $check_out_sql = "update parkings set status = 'completed', end_time = '$end_time', total_cost = $price where id = $parking_id;";

            try {
                $conn->query($check_out_sql);

                $current_available = $_GET['current_available'] + 1;

                $location_id = $_GET['location_id'];

                $update_cur_ava_sql = "update locations set current_available = $current_available where id = '$location_id';";

                try {
                    $conn->query($update_cur_ava_sql);

                    echo '<div class="snackbar green">Check out successfully! The total Price is $'.$price.'.</div>';
                } catch (mysqli_sql_exception $e) {
                    echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
                }
                
            } catch (mysqli_sql_exception $e) {
                echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
            }

        }

        public function list_current_parkings(mysqli $conn, string $sql) {
            $cur_parking_result = $conn->query($sql);

            if(mysqli_num_rows($cur_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Location ID</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Cost</th>
                        <th>Operation</th>
                    </tr>';
                while($row = mysqli_fetch_array($cur_parking_result)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$$row[6]/hour</td>
                        <td><a href='./check_out.php?check_out=true&id=$row[0]&start_time=$row[4]&cost=$row[6]&current_available=$row[7]&location_id=$row[2]'>Check Out</a></td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<h3>You do not have current parkings!</h3>';
            }
        }

        public function list_past_parkings(mysqli $conn, $sql) {
            $past_parking_result = $conn->query($sql);

            if(mysqli_num_rows($past_parking_result) > 0){
                echo '<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Location ID</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Cost</th>
                    </tr>';
                while($row = mysqli_fetch_array($past_parking_result)) {
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$$row[6]</td>
                        <td>$row[7]</td>
                        <td>$$row[8]/hour</td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo '<h3>You do not have past parkings!</h3>';
            }
        }

    }

    class Administrator extends User {
        
        public function insert_location(mysqli $conn, string $parking_id, string $location, string $description, int $capacity, int $cost) {
            try {

                $create_location_sql = "insert into locations values('$parking_id', '$location', '$description', '$capacity', '$capacity', '$cost');";

                $conn->query($create_location_sql);
                
                echo "<div class='snackbar green'>location created successfully!</div>";

            } catch (mysqli_sql_exception $e) {
                echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
            }
        }

        public function edit_location(mysqli $conn, string $location_id, string $location, string $description, int $capacity, int $cost, int $prev_capacity, int $prev_avail) {

            if($prev_avail - ($prev_capacity - $capacity) < 0) {
                echo '<div class="snackbar red">Error: The capacity you input is too small than current available!</div>';
                return;
            }

            $current_available = $prev_avail - ($prev_capacity - $capacity);

            $edit_sql = "update locations set location = '$location', description = '$description', capacity = $capacity, current_available = $current_available, cost = $cost where id = '$location_id'";

            try {
                $conn ->query($edit_sql);
                echo '<div class="snackbar green">The parking location '.$location_id. ' is updated successfully!</div>';
            }   catch (mysqli_sql_exception $e) {
                echo '<div class="snackbar red">Error: ' . $e->getMessage() . '!</div>';
            }
        }

        public function list_users(mysqli $conn) {
            $list_users_sql = "select username, name, surname, phone, email, type from users where type = 'user';";

            $result = $conn->query($list_users_sql);

            echo "<table border=1>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                    </tr>";
                }
            }
            echo "</table>";
        }

        public function list_all_checked_in_users(mysqli $conn){
            $list_checked_in_users_sql = "select U.username, U.name, U.surname, U.phone, U.email, U.type, P.location_id, P.start_time, P.end_time, P.total_cost, P.status 
                
            from users U join parkings P on U.username= P.username where P.status = 'check-in' and type = 'user';";

            $result = $conn->query($list_checked_in_users_sql);

            echo "<table border=1>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Location ID</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                </tr>";

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $cost = $row[9] ? '$' . $row[9] : '-';
                    $end_time = $row[8] ? $row[8] : '-';

                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                        <td>$end_time </td>
                        <td>$cost</td>
                        <td>$row[10]</td>
                    </tr>";
                }
            }
            echo "</table>";
        }
    }

