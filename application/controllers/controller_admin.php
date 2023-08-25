<?php
    class Controller_Admin extends Controller {
        public function __construct()   {
            $this->model = new Model_Admin();
            $this->view = new View();            
        }

        public function action_index() {
            $this->view->generate('admin_view.php', 'template_view.php');
        }

        public function action_login() {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (($login === 'admin') && ($password === 'admin')) {
                header('Location: /admin/panel');
            } else {
                header('Location: /login');
            }
        }

        public function action_panel() {
            $nothing = 0; // Заглушка
            $data = $this->model->get_data($nothing);

            $this->view->generate('adminpanel_view.php', 'template_view.php', $data);

        }

        public function action_edit() {
            $algo = 'md5';
        
            $id = $_POST['user-id'];
            $login = $_POST['user-login'];
            $password = hash($algo, $_POST['user-password']);

            $data = [
                'id' => $id,
                'login' => $login,
                'password' => $password
            ];

            $this->model->update_data($data);
            
            header('Location: /admin/panel');
        }

        public function action_delete() {
            $id = $_POST['user-id'];

            $data = [
                'id' => $id
            ];

            $this->model->delete_data($data);

            header('Location: /admin/panel');
        }
    }