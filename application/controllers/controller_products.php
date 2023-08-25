<?php
    class Controller_Products extends Controller {
        function __construct() {
            $this->model = new Model_Products();
            $this->view = new View();
        }
        
        public function action_index() {
            if (!isset($_COOKIE['userId'])) {
                header('Location: /login');
            } 
            
            global $categoriesId;
            if (isset($_POST['categories-id'])) {
                $categoriesId = $_POST['categories-id'];
                setcookie('categoriesId', $categoriesId, time() + 604800, '/');
            } else {
                if (isset($_COOKIE['categoriesId'])) {
                    global $categoriesId;
                    $categoriesId = $_COOKIE['categoriesId'];
                } else {
                    header('Location: /categories');
                }
            }

            $userId = $_COOKIE['userId'];

            $categories = $this->model->get_categories($userId);
            $products = $this->model->get_data($categoriesId);

            $data = [
                'categoriesId' => $categoriesId,
                'categories' => $categories,
                'products' => $products
            ];

            $this->view->generate('products_view.php', 'template_view.php', $data);
        }

        public function action_add() {
            $categoriesId = $_COOKIE['categoriesId'];

            $name = $_POST['product-name'];
            $description = $_POST['product-description'];
            $price = $_POST['product-price'];

            $data = [
                'categoriesId' => $categoriesId,
                'name' => $name,
                'description' => $description,
                'price' => $price
            ];

            $this->model->put_data($data);

            header('Location: /products');
        }

        public function action_edit() {
            $id = $_POST['product-id'];
            $name = $_POST['product-name'];
            $description = $_POST['product-description'];
            $price = $_POST['product-price'];
            $categoriesId = $_POST['product-categories'];

            $data = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'categoriesId' => $categoriesId
            ];

            $this->model->update_data($data);

            header('Location: /products');
        }

        public function action_delete() {
            $id = $_POST['product-id'];

            $data = [
                'id' => $id
            ];

            $this->model->delete_data($data);

            header('Location: /products');
        }
    }