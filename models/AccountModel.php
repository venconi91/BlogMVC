<?php

class AccountModel extends BaseModel {

    public function register($username, $password) {
        $statement = self::$db->prepare("SELECT COUNT(id) FROM users where username=?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if ($result['COUNT(id)']) {
            return false;
        }

        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare("INSERT INTO users (username, pass_hash) VALUES (?,?)");
        $registerStatement->bind_param("ss", $username, $hash_pass);
        $registerStatement->execute();
        //
        $getIdStatement = self::$db->prepare("SELECT id FROM users where username=? and pass_hash=?");
        $getIdStatement->bind_param("ss", $username, $hash_pass);
        $getIdStatement->execute();
        $getIdResult = $getIdStatement->get_result()->fetch_assoc();
        //
        $_SESSION['userId'] = $getIdResult['id'];

        return true;
    }

    function login($username, $password) {
        $statement = self::$db->prepare("SELECT id,username,pass_hash FROM users where username=?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if (password_verify($password, $result['pass_hash'])) {
            $_SESSION['userId'] = $result['id'];

            return true;
        }

        return false;
    }

}