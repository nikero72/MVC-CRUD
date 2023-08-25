<?php
    class Model_Admin extends Model {
        public function get_data($data) {
            return $this->db()->query("SELECT * FROM test_start.users")->fetchAll();
        }

        public function update_data($data) {
            $id = $data['id'];
            $login = $data['login'];
            $password = $data['password'];

            $this->db()->query("UPDATE test_start.users SET login = '$login', password = '$password' WHERE id = '$id';");
        }

        public function delete_data($data) {
            $id = $data['id'];

            $this->db()->query("DELETE FROM test_start.users WHERE id = '$id';");
        }
    }