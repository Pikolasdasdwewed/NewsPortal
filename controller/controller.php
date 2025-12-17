<?php

class Controller {

    public static function StartSite() {
        $arr = News::getLast10News();
        include 'view/start.php';
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include 'view/category.php';
    }

    public static function AllNews() {
        $arr = News::getAllNews();
        include 'view/allnews.php';
    }

    public static function NewsByCatID($id) {
        $arr = News::getNewsByCategoryID($id);
        include 'view/catnews.php';
    }

    public static function NewsByID($id) {
        $n = News::getNewsByID($id);
        include 'view/readnews.php';
    }

    public static function error404() {
        include 'view/error404.php';
    }

    public static function InsertComment($text, $id) {
        Comments::insertComment($text, $id);
        header("Location: news?id=$id#ctable");
        exit;
    }

    public static function Comments($id) {
        $arr = Comments::getCommentsByNewsID($id);
        ViewComments::CommentsByNews($arr);
    }

    public static function CommentsCount($id) {
        $arr = Comments::getCommentCountByNewsID($id);
        ViewComments::CommentsCount($arr);
    }

    public static function CommentsCountWithAncor($id) {
        $arr = Comments::getCommentCountByNewsID($id);
        ViewComments::CommentsCountWithAncor($arr);
    }

    //-------------------РЕГЕСТРАЦИЯ-------------
    public static function registerForm()
    {
        include_once('view/formRegister.php');
    }

    public static function registerUser()
    {
        $result = Register::registerUser();
        include_once('view/answerRegister.php');
    }

}
?>
