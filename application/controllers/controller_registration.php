<?php
    class Controller_Registration extends Controller{
        
        function action_index() {
            $this->view->generate('registration_view.php', 'template_view.php');
        }

        function action_registration() {
             $data = [
                'login' => $_POST['login'],
                'password' => $_POST['password'],
             ];

             $this->model = new Model_Registration();
             $this->model->put_data($data);
             header('Location: /login');
        }

    }