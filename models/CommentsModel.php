<?php

class CommentsModel extends BaseModel{

    function create($postId, $content, $visitor_name, $visitor_email) {
        $createStatement = self::$db->prepare("INSERT INTO comments (content, post_id, visitor_name, visitor_email) VALUES (?,?,?,?)");
        $createStatement->bind_param("siss", $content, $postId, $visitor_name, $visitor_email);
        $createStatement->execute();

        return $createStatement->affected_rows > 0;
    }

}