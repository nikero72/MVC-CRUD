<?php
    class Model_Review extends Model {
        public function get_data($data) {
            return $this->db()->query("
            SELECT 
                users.id AS user_id, 
                users.login AS user_login, 
                Categories.Name AS categories_name, 
                Product.Name AS product_name, 
                Product_description.Description AS product_description, 
                Product.Price AS product_price
            FROM test_start.users
                INNER JOIN test_start.Categories
                    ON Categories.Client_id = users.id
                INNER JOIN test_start.Product
                    ON Product.id_categories = Categories.Id
                INNER JOIN test_start.Product_description
                    ON Product_description.Product_id = Product.Id
            ")->fetchAll();
        }
    }