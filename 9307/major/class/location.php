<?php
    class Location {
        public string $id;
        public string $location;
        public string $description;
        public int $capacity;
        public int $cost;

        public function __construct($id, $location, $description, $capacity, $cost) {
            $this->id = $id;
            $this->location = $location;
            $this->description = $description;
            $this->capacity = $capacity;
            $this->cost = $cost;
        }

        public function get_id() {
            return $this->id;
        }

        public function get_location() {
            return $this->location;
        }

        public function get_capacity() {
            return $this->capacity;
        }
        public function get_cost() {
            return $this->cost;
        }
    }