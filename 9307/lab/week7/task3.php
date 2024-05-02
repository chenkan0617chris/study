<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Employee {
            public int $EID;
            public string $name;
            public string $surname;
            public string $position;
            public int $unit;
            public int $salary;

            public function __construct($EID, $name, $surname, $position, $unit, $salary) {
                $this->EID = $EID;
                $this->name = $name;
                $this->surname = $surname;
                $this->position = $position;
                $this->salary = $salary;
                $this->unit = $unit;
            }

            public function __get($name){
                return $this->$name;
            }

            public function __set($name, $value){
                return $this->$name = $value;
            }
            
            public function display_info(){
                echo "EID: $this->EID <br/>";
                echo "name: $this->name<br/>";
                echo "surname: $this->surname<br/>";
                echo "position: $this->position<br/>";
                echo "unit: $this->unit<br/>";
                echo "salary: $this->salary<br/>";
                return;
            }
        }

        $employee1 = new Employee(1, 'Kan', 'Chen', 'Student', 4, 10000);

        echo $employee1->__get('salary');

        $employee1->__set('salary', 20000);

        $employee1->display_info();
    ?>
</body>
</html>