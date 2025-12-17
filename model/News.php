<?php
class News {

    public static function getLast10News() {
        $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
        $db = new Database();
        return $db->getAll($query);
    }

    public static function getAllNews() {
        $query = "SELECT * FROM news ORDER BY id DESC";
        $db = new Database();
        return $db->getAll($query);
    }

    public static function getNewsByCategoryID($id) {
        $query = "SELECT * FROM news WHERE category_id = " . intval($id) . " ORDER BY id DESC";
        $db = new Database();
        return $db->getAll($query);
    }

    public static function getNewsByID($id) {
        $query = "SELECT * FROM news WHERE id = " . intval($id);
        $db = new Database();
        return $db->getOne($query);
    }
}
?>
