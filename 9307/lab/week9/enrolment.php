<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Center</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        td, th {
            padding: 8px;
        }

        .red {
            color: red;
        }     
        .green {
            color: green;
        }   
    </style>
</head>
<body>
    <div>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="enrolment.php">Enrolment</a>
        <a href="queries.php">Queries</a>
    </div>
    <h1>
        Enrolment Page
    </h1>
    <?php
        function connect_to_mysql() {
            $connection = new mysqli('localhost', 'root', 'ck951717', 'fitnesscenter');

            return $connection;
        }

        if(isset($_SESSION['id'])){
            $GLOBALS['user_id'] = $_SESSION['id'];

            echo '<a href="./enrolment.php">Refresh</a>';

            try {
                $GLOBALS['my_connection'] = connect_to_mysql();
    
                $sql = "select C.id, C.title, C.class_type, I.name, I.facility from classes C join instructors I on C.instructor_id = I.id";
    
                $get_enrolment_sql = 'select * from enrolment where member_id =' . $GLOBALS['user_id'] . ';';
    
                $result = $GLOBALS['my_connection']->query($sql);
    
                $enrol_result = $GLOBALS['my_connection']->query($get_enrolment_sql);
    
                // enrol a new class
                if(isset($_GET['enrol'])) {
                    $enrol_class_id = $_GET['enrol'];

                    function enrol() {
                        $enrol_class_id = $_GET['enrol'];

                        $enrol_sql = 'insert into enrolment (class_id, member_id) values ("' . $enrol_class_id . '",' . $GLOBALS['user_id'] .');';
                    
                        try {
                            $GLOBALS['my_connection']->query($enrol_sql);

                            echo "<span class='green'>".$enrol_class_id . "enrolled successfully!</span>";
        
                        } catch (mysqli_sql_exception $e) {
                            echo 'Error: ' . $e->getMessage() . '!';
                        }
                    }

                    // check class members enrol limit
                    $check_sql = "select count(E.member_id) as amount, C.class_Type from enrolment E join classes C on E.class_id = C.id where E.class_id = '".$enrol_class_id."' group by C.id;";
                    $check_result = $GLOBALS['my_connection']->query($check_sql);
                    if(mysqli_num_rows($check_result) > 0) {
                        while($row = mysqli_fetch_assoc($check_result)){ 
                            if($row['class_Type'] === 'group') {
                                if($row['amount'] >= 6) {
                                    echo "<span class='red'>This group class is full!</span>";
                                } else {
                                    enrol();
                                }
                            } else {
                                if($row['amount'] > 0) {
                                    echo "<span class='red'>This individual class is full!</span>";
                                } else {
                                    enrol();
                                }
                            }
                        }
                    } else {
                        enrol();
                    }
                }
    
                // withdraw a class
                if(isset($_GET['withdraw'])) {
                    $withdraw_class_id = $_GET['withdraw'];
    
                    $withdraw_sql = 'delete from enrolment where class_id = "'.$withdraw_class_id.'" and member_id = '.$GLOBALS['user_id'].';';
                    try {
                        $GLOBALS['my_connection']->query($withdraw_sql);

                        echo "<span class='green'>".$withdraw_class_id . "withdrawn successfully!</span>";
    
                    } catch (mysqli_sql_exception $e) {
                        echo 'Error: ' . $e->getMessage() . '!';
                    }
                    
                }
    
    
                if(mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Class Type</th>
                                <th>Instructor Name</th>
                                <th>Facility</th>
                                <th>operation</th>
                            </tr>";
                    while ($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $class_type = $row['class_type'];
                        $name = $row['name'];
                        $facility = $row['facility'];
                        $operation = "<a href='./enrolment.php?enrol=" . $id . "'>Enrol</a>";
    
                        if(mysqli_num_rows($enrol_result) > 0) {
                            foreach($enrol_result as $key => $enrol_row) {
                                if($enrol_row['class_id'] == $id) {
                                    
                                    $operation = "<a href='./enrolment.php?withdraw=" . $id . "'>Withdraw</a>";
                             
                                    break;
                                } 
                            }
                        }
    
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$title</td>
                            <td>$class_type</td>
                            <td>$name</td>
                            <td>$facility</td>
                            <td style='text-align: center'>$operation</td>
                        </tr>";
                        
                    }
                    echo "</table>";
                }
            }  catch (mysqli_sql_exception $e) {
                echo 'Error: ' . $e->getMessage() . '!';
            }
        } else {
            echo 'please login first.' . '<a href="./login.php">Login</a>';
        }
    
    ?>
</body>
</html>