<?php
class ViewNews {

    private static function renderPicture($picture, int $width): void {
        if (is_resource($picture)) {
            $picture = stream_get_contents($picture);
        }
        if ($picture === null || $picture === '') return;

        $asText = trim((string)$picture);

        // Если в BLOB лежит URL (как у тебя сейчас после CAST) — выводим обычным src
        if ($asText !== '' && (str_starts_with($asText, 'http://') || str_starts_with($asText, 'https://') || str_starts_with($asText, '/'))) {
            $src = htmlspecialchars($asText, ENT_QUOTES, 'UTF-8');
            echo '<img src="'.$src.'" width="'.$width.'" alt=""><br>';
            return;
        }

        // Иначе считаем, что это реальные байты картинки (старый вариант)
        echo '<img src="data:image/jpeg;base64,'.base64_encode($picture).'" width="'.$width.'" alt=""><br>';
    }

    public static function NewsByCategory($arr) {
        foreach ($arr as $value) {
            self::renderPicture($value['picture'], 150);
            echo "<h2>".$value['title']."</h2>";
            Controller::CommentsCount($value['id']);
            echo "<a href='news?id=".$value['id']."'>Edasi</a><br><br>";
        }
    }

    public static function AllNews($arr) {
        foreach ($arr as $value) {
            echo "<h3>".$value['title']."</h3>";
            Controller::CommentsCount($value['id']);
            echo "<a href='news?id=".$value['id']."'>Edasi</a><br><br>";
        }
    }

    public static function ReadNews($n) {
        echo "<h2>".$n['title']."</h2>";
        Controller::CommentsCount($n['id']);
        echo "<br>";
        self::renderPicture($n['picture'], 200);
        echo "<p>".$n['text']."</p>";
    }
}
?>
