<?php
class Category {

    public static function getAllCategory() {
        $query = "SELECT * FROM category";
        $db = new Database();
        return $db->getAll($query);
    }
}
?>
