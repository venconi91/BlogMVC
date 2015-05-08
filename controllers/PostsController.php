<?php

class PostsController extends BaseController {

    private $db;

    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }

    function view($postId) {
        $this->db->incrementVisits($postId);
        $this->postsWithComments = $this->db->getPostByIdWithAllContent($postId);

        $this->renderView(__FUNCTION__);
    }

    function create() {
        $title = $_POST['title'];
        $this->isValid($title);
        $content = $_POST['content'];
        $tags = $_POST['tags'];

        if (!$this->isValid($title) || !$this->isValid($content) || !$this->isValid($tags)) {
            $this->addErrorMessage("title content or tags field is invalid");
            $this->redirectToUrl("/home/index");
        }
        
        // prevent csrf
        $sessionToken = $_SESSION['create_post_token'];
        $formToken = $_POST['token'];
        if ($sessionToken != $formToken) {
            $this->redirectToUrl("/home/index");
        }
        
        $userId = $_SESSION['userId'];

        if ($this->db->create($title, $content, $userId)) {
            $this->addInfoMessage("Post created.");
        } else {
            $this->addErrorMessage("Error creating post.");
        }

        $this->insertTags($tags, $title, $content);

        $this->redirect('home');
    }

    function index($from = 0, $count = 4) {
        if ($from < 0 || $count < 0) {
            $this->redirect("posts", "index");
        }

        $this->from = $from;
        $this->count = $count;
        $userId = $_SESSION['userId'];

        $this->allPosts = $this->db->getAllFromAuthorWithPaging($from, $count, $userId);

        $this->renderView("index");
    }
    
    function search() {
        $searchedTag = $_GET['search'];
        $this->searchedPostsByTag = $this->db->searchAllPostsByTag($searchedTag);
        
        $this->renderView(__FUNCTION__);
    }

    function viewByTag($tagName = NULL) {
        if ($tagName == null) {
            $this->redirectToUrl("/posts/index");
        }
        if (!isset($_SESSION['userId'])) {
            $this->redirectToUrl("/account/login");
        }
        
        $userId = $_SESSION['userId'];
        $this->userPostsByTag = $this->db->getUserPostsByTag($tagName, $userId);

        $this->renderView(__FUNCTION__);
    }

    private function insertTags($tagsString, $title, $content) {
        $tagsArray = explode(",", $tagsString);
        foreach ($tagsArray as $tag) {
            $tag = trim($tag);

            $this->db->insertTag($tag);
            if (!$this->db->connectTagWithPost($tag, $title, $content)) {
                //$this->addErrorMessage("connecting tags with posts failed");
            }
        }

        $this->redirectToUrl("/home/index");
    }
}