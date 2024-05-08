<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


        class Papa {
            public string $name;
            public int $age;

            public function __construct($age, $name) {
                $this->name = $name;
                $this->age = $age;
            }

            public function getName() {
                return $this->name;
            }
        }

        class Child extends Papa {
            public string $game;

            public function __construct($age, $name, $game) {
                Papa::__construct($age, $name);

                $this->game = $game;

                
            }

            public function playGame() {
                return $this->game;
            }
        }


        $child1 = new Child(10, 'kan', 'dota');

        echo $child1->getName();
        echo $child1->playGame();
    ?>
</body>
</html>