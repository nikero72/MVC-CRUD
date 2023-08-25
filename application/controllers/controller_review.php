<?php
    class Controller_Review extends Controller {
        public function __construct()   {
            $this->model = new Model_Review();
            $this->view = new View();
        }
        public function action_index()  {
            $nothing = 0; // Заглушка

            $data = $this->model->get_data($nothing);

            $this->view->generate('review_view.php', 'template_view.php', $data);
        }
    }