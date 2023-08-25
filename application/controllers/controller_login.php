<?php
    class Controller_Login extends Controller{
        
        function action_index() {
            if (isset($_COOKIE['userId'])) {
                header('Location: /categories');
            }
            $this->view->generate('login_view.php', 'template_view.php');
        }

        function action_login() {
            $algo = "md5";
            $login = $_POST['login'];
            $password = hash($algo, $_POST['password']);

            $this->model = new Model_Login();
            $user = $this->model->get_data($login);
            
            if (($user['login'] === $login) && $user['password'] === $password) {
                setcookie('userId', $user['id'], time() + 604800, '/');
                header('Location: /categories');
            } else {
                setcookie('error', '1', time() + 1, '/');
                header('Location: /login');
            };
        }

        function action_logout() {
            setcookie('userId', "", time() - 604800, '/');
            setcookie('categoriesId', "", time() - 604800, '/');
            setcookie('error', "", time() - 604800, '/');

            header('Location: /login');
        }
    }