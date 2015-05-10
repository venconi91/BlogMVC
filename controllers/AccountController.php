<?php

class AccountController extends BaseController {

    private $db;

    public function onInit() {
        $this->title = "Account";
        $this->db = new AccountModel();
    }

    function register() {
        if ($this->isPost) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if (!$this->isValid($username) || !$this->isValid($password)) {
                $this->addErrorMessage("invalid username or password");
                $this->redirect("account", "register");
            }

            $isRegistered = $this->db->register($username, $password);
            if ($isRegistered) {
                $_SESSION['username'] = $username;
                $this->redirect("home", "index");
            } else {
                $this->addErrorMessage("registration failed");
            }
        }

        $this->renderView(__FUNCTION__);
    }

    function login() {
        if ($this->isPost) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $isLoggedIn = $this->db->login($username, $password);
            if ($isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("successful login");
                $this->redirect("home", "index");
            } else {
                $this->addErrorMessage("username or password is invalid");
                $this->redirect("account", "login");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    function logout() {
        session_destroy();
        $this->addInfoMessage("successful logout");
        $this->redirect("account", "login");
    }

}