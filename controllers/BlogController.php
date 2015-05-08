<?php

class Blog extends BaseController{
    
    private $db;

    public function onInit() {
        $this->title = "Blogs";
        $this->db = new BlogsModel();
    }
    
    // blog po username
    function find($name = null) {
        if (!null) {
            $result = $this->db->find($name);
            
            
        }
    }
}