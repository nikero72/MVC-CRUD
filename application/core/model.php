<?php
    class Model {
        private $db;

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=test_start', 'slava', '2004');
        }
        
        public function get_data($data) {
        }

        public function put_data($data) {
        }

        public function db() {
            return $this->db;
        }
    }