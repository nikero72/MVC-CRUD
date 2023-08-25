<?php 
    class Controller_Categories extends Controller {
        function __construct() {
            $this->model = new Model_Categories();
            $this->view = new View();
        }
        
        function action_index() {
            global $userId;
            if (isset($_COOKIE['userId'])) {
                global $userId;
                $userId = $_COOKIE['userId'];
            } else {
                header('Location: /login');
            }

            $categories = $this->model->get_data($userId);
            $this->view->generate('categories_view.php', 'template_view.php', $categories);
        }

        function action_add() {
            $userId = $_COOKIE['userId'];
            $name = $_POST['categories-name'];

            $data = [
                'userId' => $userId,
                'name' => $name
            ];

            $this->model->put_data($data);

            header('Location: /categories');
        }
        
        function action_edit() {
            $id = $_POST['categories-id'];
            $name = $_POST['categories-name'];

            $data = [
                'id' => $id,
                'name' => $name
            ];

            $this->model->update_data($data);
            
            header('Location: /categories');
        }

        function action_delete() {
            $id = $_POST['categories-id'];

            $data = [
                'id' => $id
            ];

            $this->model->delete_data($data);

            header('Location: /categories');
        }
    }