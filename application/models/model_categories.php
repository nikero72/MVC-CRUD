<?php
    class Model_Categories extends Model {
        public function get_data($userId) {
            return $this->db()->query("SELECT * FROM test_start.Categories WHERE Client_id = '$userId';")->fetchAll();
        }

        public function put_data($data) {
            $userId = $data['userId'];
            $name = $data['name'];

            $this->db()->query("INSERT INTO test_start.Categories (Id, Name, Client_id) VALUES (NULL, '$name', '$userId');");
        }

        public function update_data($data) {
            $id = $data['id'];
            $name = $data['name'];

            $this->db()->query("UPDATE test_start.Categories SET Name = '$name' WHERE Id = '$id';");
        }

        public function delete_data($data) {
            $id = $data['id'];

            $this->db()->query("DELETE FROM test_start.Categories WHERE Id = '$id';");
        }
    }