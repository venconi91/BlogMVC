<?php

class CommentsController extends BaseController {

    private $db;

    public function onInit() {
        $this->title = "Comments";
        $this->db = new CommentsModel();
    }

    function create($postId) {
        
        $content = $_POST['content'];
        $visitor_name = $_POST['visitor_name'];
        $visitor_email = $_POST['visitor_email'];
        if (!$this->isValid($content) || !$this->isValid($visitor_name)) {
            $this->addErrorMessage("invalid content or author");
            $this->redirectToUrl("/posts/view/$postId");
        }
        $createCommentResult = $this->db->create($postId, $content, $visitor_name, $visitor_email);
        if ($createCommentResult) {
            $this->addInfoMessage("comment created successfully");
        } else {
            $this->addErrorMessage("comment created failed");
        }
        
        $this->redirectToUrl("/posts/view/$postId");
    }

}