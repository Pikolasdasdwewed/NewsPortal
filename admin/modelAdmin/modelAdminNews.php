<?php
class modelAdminNews {

    // -------- list
    public static function getNewsList() {
        $sql = "
            SELECT news.*, category.name AS category_name, users.username
            FROM news
            JOIN category ON news.category_id = category.id
            JOIN users    ON news.user_id = users.id
            ORDER BY news.id DESC
        ";
        $db = new Database();
        return $db->getAll($sql);
    }

    // -------- detail (для edit/delete форм)
    public static function getNewsDetail($id) {
        $id = (int)$id;
        $sql = "
            SELECT news.*, category.name AS category_name, users.username
            FROM news
            JOIN category ON news.category_id = category.id
            JOIN users    ON news.user_id = users.id
            WHERE news.id = $id
            LIMIT 1
        ";
        $db = new Database();
        return $db->getOne($sql);
    }

    // -------- add (для controllerAdminNews::newsAddResult)
    public static function getNewsAdd() {
        $test = false;

        if (isset($_POST['save'])) {
            $title = addslashes($_POST['title'] ?? '');
            $text  = addslashes($_POST['text'] ?? '');
            $catId = (int)($_POST['idCategory'] ?? 0);

            $image = '';
            if (!empty($_FILES['picture']['tmp_name']) && is_uploaded_file($_FILES['picture']['tmp_name'])) {
                $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
            }

            $userId = (int)($_SESSION['userId'] ?? 1);

            $sql = "INSERT INTO news (title, text, picture, category_id, user_id)
                    VALUES ('$title', '$text', '$image', $catId, $userId)";

            $db = new Database();
            $ok = $db->executeRun($sql);
            if ($ok == true) $test = true;
        }

        return $test;
    }

    // -------- edit (для controllerAdminNews::newsEditResult)
    public static function getNewsEdit($id) {
        $id = (int)$id;
        $test = false;

        if (isset($_POST['save'])) {
            $title = addslashes($_POST['title'] ?? '');
            $text  = addslashes($_POST['text'] ?? '');
            $catId = (int)($_POST['idCategory'] ?? 0);

            $hasFile = (!empty($_FILES['picture']['tmp_name']) && is_uploaded_file($_FILES['picture']['tmp_name']));

            if ($hasFile) {
                $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                $sql = "UPDATE news
                        SET title='$title', text='$text', picture='$image', category_id=$catId
                        WHERE id=$id";
            } else {
                $sql = "UPDATE news
                        SET title='$title', text='$text', category_id=$catId
                        WHERE id=$id";
            }

            $db = new Database();
            $ok = $db->executeRun($sql);
            if ($ok == true) $test = true;
        }

        return $test;
    }

    // -------- delete (для controllerAdminNews::newsDeleteResult)
    public static function getNewsDelete($id) {
        $id = (int)$id;
        $test = false;

        if (isset($_POST['save'])) {
            $db = new Database();

            // сначала удаляем комментарии
            $db->executeRun("DELETE FROM comments WHERE news_id = $id");

            // потом удаляем новость
            $ok = $db->executeRun("DELETE FROM news WHERE id = $id");

            if ($ok == true) $test = true;
        }

        return $test;
    }
}
?>
