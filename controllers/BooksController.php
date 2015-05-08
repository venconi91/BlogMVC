<?php

class BooksController extends BaseController {
    public function onInit() {
        $this->title = "Bookss";
    }

    public function index() {
        $this->renderView();
    }
}
