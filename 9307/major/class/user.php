<?php
    class People {
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

        public function get_name() {
            return $this->name;
        }

        public function get_type() {
            return $this->type;
        }

    }

    class Administrator extends People {
       public function insert_parking_location() {
            
       }
    }

    class User extends People {
        public function __construct() {
            
        }
    }
