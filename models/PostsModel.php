<?php

class PostsModel extends BaseModel {

    function create($title, $content, $userId) {
        $createStatement = self::$db->prepare("INSERT INTO posts (title, content, user_id) VALUES (?,?,?)");
        $createStatement->bind_param("ssi", $title, $content, $userId);
        $createStatement->execute();

        return $createStatement->affected_rows > 0;
    }

    function viewLastFive($userId) {
        $statement = self::$db->query("SELECT p.id, p.title, p.content FROM posts p where p.user_id = $userId ORDER BY id DESC Limit 5");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllFromAuthorWithPaging($from, $count, $userId) {

        $statement = self::$db->query("SELECT id,title FROM posts where user_id=$userId ORDER BY id DESC LIMIT $from, $count");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getPostByIdWithAllContent($postId) {
        $statement = self::$db->query("SELECT p.id, p.title, p.content as post_content, p.visits_count, c.content as comment_content, c.visitor_name, c.visitor_email FROM posts p left join comments c on p.id = c.post_id where p.id = $postId");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllUserTags($userId) {
        $sql = "select DISTINCT(t.tag), t.id from users u left join posts p on u.id = p.user_id join posts_tags pt on p.id = pt.post_id join tags t on pt.tag_id = t.id where u.id = $userId";
        $statement = self::$db->query($sql);

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function incrementVisits($postId) {
        $sql = "UPDATE posts SET `visits_count` = `visits_count` + 1 WHERE id = ?";
        $createStatement = self::$db->prepare($sql);
        $createStatement->bind_param("i", $postId);
        $createStatement->execute();

        return $createStatement->affected_rows > 0;
    }
    
    function insertTag($tag) {
        $createStatement = self::$db->prepare("INSERT IGNORE INTO tags (tag) VALUES (?)");
        $createStatement->bind_param("s", $tag);
        $createStatement->execute();

        return $createStatement->affected_rows > 0;
    }

    function connectTagWithPost($tag, $title, $content) {
        $sqlString = "INSERT IGNORE INTO posts_tags (post_id, tag_id) VALUES ((SELECT id from posts p where p.title = ? && p.content = ?), (SELECT id from tags t where t.tag = ?))";
        $createStatement = self::$db->prepare($sqlString);
        $createStatement->bind_param("sss", $title, $content, $tag);
        $createStatement->execute();

        return $createStatement->affected_rows > 0;
    }

    function getUserPostsByTag($tagName, $userId) {
        $tagName = mysql_real_escape_string($tagName);
        $sql = "select p.title, p.id from users u left join posts p on u.id = p.user_id join posts_tags pt on p.id = pt.post_id join tags t on pt.tag_id = t.id where t.tag = '$tagName' AND u.id = $userId";
        $statement = self::$db->query($sql);

        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    function searchAllPostsByTag($tagName) {
        $tagName = mysql_real_escape_string($tagName);
        $sql = "select p.title, p.id from posts p join posts_tags pt on p.id = pt.post_id join tags t on pt.tag_id = t.id where t.tag = '$tagName' order by p.id DESC";
        $statement = self::$db->query($sql);

        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}