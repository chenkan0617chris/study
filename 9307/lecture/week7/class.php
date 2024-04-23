<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class BankAccount {

            public function deposit() {

            }
            

            function __construct(public float $accountNumber){

            }
            public $balance = 1000;

            public function withdraw($amount) {
                $this->balance -= $amount;
            }
        }

        $my_bank_account = new BankAccount();

        $my_bank_account->withdraw(500);

        echo $my_bank_account->balance;
    
    
    ?>

</body>
</html>