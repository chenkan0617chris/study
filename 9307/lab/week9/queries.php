<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        Queries Page
    </h1>
    <div>
        <?php
            function connect_to_mysql() {
                $connection = new mysqli('localhost', 'root', 'ck951717', 'fitnesscenter');

                return $connection;
            }

            try {
                $GLOBALS['my_connection'] = connect_to_mysql();
            } catch (mysqli_sql_exception $e) {
                echo 'Error: ' . $e->getMessage() . '!';
            }
            
            function render_queryA() {
                return '<p>Query A：The ID and title of classes (for example, G1 – group yoga) offered by a specific facility
                (specific facility means FCNorth or FCSouth);</p>
                    <form action="queries.php" method="post">
                        <label>Facility: </label>
                        <select name="facility">
                            <option value="FCNorth">FCNorth</option>
                            <option value="FCSouth">FCSouth</option>
                        </select>
                        <input type="submit" value="query" name="queryA"/>
                    </form>';
            };

            

            function render_queryB() {
                return '<p>Query B：The name of the members enrolled in a specific class (the member should enter/select
                either ID or name of the class);</p>
                    <form action="queries.php" method="post">
                        <label>Class ID: </label><input type="text" name="id" />
                        <label>Class Title: </label><input type="text" name="title" />
                        <input type="submit" value="query" name="queryB"/>
                    </form>';
            };

            function render_queryC() {
                return '<p>Query C：The name of the instructors in a specific facility (the member should enter/select the
                facility);</p>
                    <form action="queries.php" method="post">
                        <label>Facility: </label>
                        <select name="facility">
                            <option value="FCNorth">FCNorth</option>
                            <option value="FCSouth">FCSouth</option>
                        </select>
                        <input type="submit" value="query" name="queryC"/>
                    </form>';
            };

            function render_queryD() {
                return '<p>Query D：The number of members in each class;</p>
                    <form action="queries.php" method="post">
                        <input type="submit" value="query" name="queryD"/>
                    </form>';
            };

            function render_queryE() {
                return '<p>Query E：The memberID and name of members who have classes with a specific instructor (the
                member should enter/select the instructor);</p>
                    <form action="queries.php" method="post">
                        <label>Instructor Name: </label><input type="text" name="name" />
                        <input type="submit" value="query" name="queryE"/>
                    </form>';
            };

            function render_queryF() {
                return '<p>Query F：The number of members who have enrolled in the classes offered by each facility (note
                that, for instance, if one member has enrolled in three classes, should be counted three
                times). </p>
                    <form action="queries.php" method="post">
                        <input type="submit" value="query" name="queryF"/>
                    </form>';
            };


            function queryA(){
                // Query A get classes info
                
                echo render_queryA();
                if(isset($_POST['queryA']) && isset($_POST['facility'])) {

                    $queryA_sql = 'select C.id, C.title, I.facility from classes C join instructors I on C.instructor_id = I.id where I.facility = "' . $_POST['facility'] . '";';


                    $result = $GLOBALS['my_connection']->query($queryA_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Title</th>
                            <th>Facility</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $facility = $row['facility'];
                            echo "<tr>
                                <td>$id</td>
                                <td>$title</td>
                                <td>$facility</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }


            function queryB() {
                echo render_queryB();
                if(isset($_POST['queryB']) && (isset($_POST['id']) || isset($_POST['title'] ))) {

                    if($_POST['id'] != "")  {
                        if($_POST['title'] != "") {
                            $queryB_sql = "select M.name, C.id, C.title from members M join enrolment E on M.id = E.member_id join classes C 
                            on E.class_id = C.id where C.id = '". $_POST['id'] . "' and C.title = '" . $_POST['title'] . "';";
                        } else {
                            $queryB_sql = "select M.name, C.id, C.title from members M join enrolment E on M.id = E.member_id join classes C 
                            on E.class_id = C.id where C.id = '". $_POST['id'] . "';";
                        }
                    } else {
                        $queryB_sql = "select M.name, C.id, C.title from members M join enrolment E on M.id = E.member_id join classes C 
                        on E.class_id = C.id where C.title = '". $_POST['title'] . "';";
                    }


                    $result = $GLOBALS['my_connection']->query($queryB_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Members name</th>
                            <th>Class ID</th>
                            <th>Class Title</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row['name'];
                            $title = $row['title'];
                            $id = $row['id'];
                            echo "<tr>
                                <td>$name</td>
                                <td>$id</td>
                                <td>$title</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }

            function queryC(){
                
                echo render_queryC();
                if(isset($_POST['queryC']) && isset($_POST['facility'])) {

                    $queryC_sql = 'select name, facility from instructors where facility = "'.$_POST['facility'].'";';

                    $result = $GLOBALS['my_connection']->query($queryC_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Instructor Name</th>
                            <th>facility</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $name = $row['name'];
                            $facility = $row['facility'];
                            echo "<tr>
                                <td>$name</td>
                                <td>$facility</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }

            function queryD(){
                
                echo render_queryD();
                if(isset($_POST['queryD'])) {
                    
                    $queryD_sql = "select C.title, count(M.name) as Members_Amount from classes C join enrolment E 
                    on C.id = E.class_id join members M on E.member_id = M.id group by C.title;";

                    $result = $GLOBALS['my_connection']->query($queryD_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Class Name</th>
                            <th>Members_Amount</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $title = $row['title'];
                            $Members_Amount = $row['Members_Amount'];
                            echo "<tr>
                                <td>$title</td>
                                <td>$Members_Amount</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }

            function queryE(){
                
                echo render_queryE();
                if(isset($_POST['queryE']) && isset($_POST['name'])) {
                     
                    $queryE_sql = "select M.id, M.name, C.title, I.name as instructor_name from members M join enrolment E on M.id = E.member_id join classes C 
                    on E.class_id = C.id join instructors I on C.instructor_id = I.id where I.name = '".$_POST['name']."';";

                    $result = $GLOBALS['my_connection']->query($queryE_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Class Name</th>
                            <th>Instructor Name</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $title = $row['title'];
                            $instructor_name = $row['instructor_name'];

                            echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$title</td>
                                <td>$instructor_name</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }

            function queryF(){
                
                echo render_queryF();
                if(isset($_POST['queryF'])) {

                    $queryE_sql = "select I.facility, count(M.name) as member_enrolled from instructors I join classes C 
                    on I.id = C.instructor_id join enrolment E on C.id = E.class_id join members M on M.id = E.member_id group by I.facility;";

                    $result = $GLOBALS['my_connection']->query($queryE_sql);

                    echo "<table border=1>
                        <tr>
                            <th>Facility</th>
                            <th>Number of member enrolled</th>
                        </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $facility = $row['facility'];
                            $member_enrolled = $row['member_enrolled'];
                            echo "<tr>
                                <td>$facility</td>
                                <td>$member_enrolled</td>
                            </tr>";
                        }
                    }
                    echo '</table>';
                }
            }

            

            if(isset($_SESSION['id'])){
                echo "<hr style='width: 100%' />";
                queryA();
                echo "<hr style='width: 100%' />";
                queryB();
                echo "<hr style='width: 100%' />";
                queryC();
                echo "<hr style='width: 100%' />";
                queryD();
                echo "<hr style='width: 100%' />";
                queryE();
                echo "<hr style='width: 100%' />";
                queryF();
                echo "<hr style='width: 100%' />";

            } else {
                echo 'please login first.' . '<a href="./login.php">Login</a>';
            }
        ?>   
    </div>
     
</body>
</html>