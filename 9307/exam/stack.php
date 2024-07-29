<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Stack {
            protected $stack;

            public function __construct() {
                $this->stack = array();
            }

            public function push($item) {
                array_push($this->stack, $item);
            }

            public function pop() {
                if(empty($this->stack)){
                    echo 'this stack is empty!';
                } else {
                    return array_pop($this->stack);
                }
            }
            public function top() {
                if(empty($this->stack)){
                    echo 'this stack is empty!';
                } else {
                    return $this->stack[count($this->stack) - 1];
                }
            }

        }

        $stack1 = new Stack();
        $stack1->push(1);
        $stack1->push(2);
        $stack1->push(3);
        echo $stack1->pop();

        echo $stack1->top();

    ?>
</body>
</html>