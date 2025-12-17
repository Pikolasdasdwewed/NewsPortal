<?php
class Comments {

    public static function insertComment($text, $news_id) {
        $db = new Database();

        $query = "INSERT INTO comments (news_id, text, date)
                  VALUES (:id, :text, NOW())";

        $stmt = $db->dbh->prepare($query);
        return $stmt->execute([
            ':id' => intval($news_id),
            ':text' => $text
        ]);
    }

    public static function getCommentsByNewsID($id) {
        $db = new Database();
        $query = "SELECT * FROM comments WHERE news_id = " . intval($id) . " ORDER BY id DESC";
        return $db->getAll($query);
    }

    public static function getCommentCountByNewsID($id) {
        $db = new Database();
        $query = "SELECT COUNT(id) AS count FROM comments WHERE news_id = " . intval($id);
        return $db->getOne($query);
    }
}
?>
