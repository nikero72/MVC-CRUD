<?php
    class Model_Login extends Model {
        public function get_data($login) {
            return $user = $this->db()->query("SELECT * FROM test_start.users WHERE users.login = '$login';")->fetch(PDO::FETCH_ASSOC);
        }
    }