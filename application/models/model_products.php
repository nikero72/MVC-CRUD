<?php
    class Model_Products extends Model {
        public function get_data($categoriesId) {
            return $this->db()->query("SELECT 
                                            P.Id AS Id, 
                                            P.Name AS Name, 
                                            Pd.Description AS Description, 
                                            P.Price AS Price, 
                                            P.id_categories AS id_categories
                                        FROM test_start.Product AS P
                                            LEFT JOIN test_start.Product_description AS Pd
                                                ON P.Id = Pd.Product_id
                                        WHERE P.id_categories = '$categoriesId';")->fetchAll();
        }

        public function get_categories($userId) {
            return $this->db()->query("SELECT * FROM test_start.Categories WHERE Client_id = '$userId';")->fetchAll();
        }

        public function put_data($data) {
            $name = $data['name'];
            $price = $data['price'];
            $description = $data['description'];
            $categoriesId = $data['categoriesId'];

            $this->db()->query("START TRANSACTION;
                                    INSERT INTO test_start.Product (Id, Name, Price, id_categories) 
                                        VALUES (NULL, '$name', '$price', '$categoriesId');
                                    INSERT INTO test_start.Product_description (Id, Description, Product_id)
                                        VALUES (NULL, '$description', (SELECT Id FROM test_start.Product WHERE Id = LAST_INSERT_ID()));
                                COMMIT;");
        }

        public function update_data($data) {
            $id = $data['id'];
            $name = $data['name'];
            $description = $data['description'];
            $price = $data['price'];
            $categoriesId = $data['categoriesId'];

            $this->db()->query("UPDATE test_start.Product
                                    LEFT JOIN test_start.Product_description
                                        ON Product.Id = Product_description.Product_id
                                SET Name = '$name', Price = '$price', id_categories = '$categoriesId', Description = '$description' 
                                WHERE Product.Id = '$id';");
        }

        public function delete_data($data) {
            $id = $data['id'];

            $this->db()->query("DELETE FROM test_start.Product WHERE Id = '$id';");
        }
    }