<?php
class ViewComments {

    public static function CommentsForm() {
        echo '<form action="insertcomment" method="get">
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            Teie kommentaar: <input type="text" name="comment">
            <input type="submit" value="Saada">
        </form>';
    }

    public static function CommentsByNews($arr) {
        if ($arr != null) {
            echo '<table id="ctable">
                    <tr>
                        <th>Kommentaar</th>
                        <th>Kuupäev</th>
                    </tr>';

            foreach ($arr as $value) {
                echo '<tr><td>'.$value['text'].'</td><td>'.$value['date'].'</td></tr>';
            }

            echo '</table>';
        }
    }

    public static function CommentsCount($value) {
        if (!empty($value['count'])) {
            echo '<b><font color="red">('.$value['count'].')</font></b>';
        }
    }

    public static function CommentsCountWithAncor($value) {
        if (!empty($value['count'])) {
            echo '<b><a href="#ctable">('.$value['count'].')</a></b>';
        }
    }
}
?>
