<?php 
    class Model_Registration extends Model{
        public function put_data($data) {
            $algo = "md5";
            $file = $_SERVER['DOCUMENT_ROOT'] . '/data.txt';

            $login = $data['login'];
            $password = hash($algo, $data['password']);

            $str = $login . " " . $password . "\r\n";

            $this->db()->query("INSERT INTO test_start.users (id, login, password) VALUES (NULL, '$login', '$password');");
            file_put_contents($file , $str, FILE_APPEND);
        } 
    }