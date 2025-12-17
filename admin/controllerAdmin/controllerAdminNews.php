<?php
class controllerAdminNews {

    public static function NewsList() {
        $arr = modelAdminNews::getNewsList();
        include_once 'viewAdmin/newsList.php';
    }

    public static function newsAddForm() {
        $arr = modelAdminCategory::getCategoryList();
        include_once 'viewAdmin/newsAddForm.php';
    }

    public static function newsAddResult() {
        // если в твоём modelAdminNews метод называется getNewsAdd()
        $test = modelAdminNews::getNewsAdd();
        $arr  = modelAdminCategory::getCategoryList();
        include_once 'viewAdmin/newsAddForm.php';
    }

    public static function newsEditForm($id) {
        $id = (int)$id;

        // если в твоём modelAdminNews детальная новость называется getNewsDetail()
        $news = modelAdminNews::getNewsDetail($id);

        $arr  = modelAdminCategory::getCategoryList();
        include_once 'viewAdmin/newsEditForm.php';
    }

    public static function newsEditResult($id) {
        $id = (int)$id;

        // если в твоём modelAdminNews метод редактирования называется getNewsEdit()
        $test = modelAdminNews::getNewsEdit($id);

        $news = modelAdminNews::getNewsDetail($id);
        $arr  = modelAdminCategory::getCategoryList();
        include_once 'viewAdmin/newsEditForm.php';
    }

    public static function newsDel()
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            modelAdminNews::getNewsDelete($id);
        }
        self::NewsList();
    }


        
    public static function newsDeleteForm($id)
    {
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }

    public static function newsDeleteResult($id)
    {
        $test = modelAdminNews::getNewsDelete($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }

}
?>
