<?php

class HomeController extends BaseController {

    private $db;

    public function onInit() {
        $this->title = "Home";
        $this->db = new PostsModel();
    }

    public function Index() {
        if (!$this->isLogedIn) {
            $this->redirectToUrl("/account/login");
        }
        
        $userId = $_SESSION['userId'];

        $token = md5(uniqid());
        $this->token = $token;
        $_SESSION['create_post_token'] = $token;

        $this->posts = $this->db->viewLastFive($userId);

        $this->tags = $this->db->getAllUserTags($userId);

        $this->renderView(__FUNCTION__);
    }

}