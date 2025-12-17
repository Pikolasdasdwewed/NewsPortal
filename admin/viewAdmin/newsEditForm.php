<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
  <div class="col-md-11">

    <h2>News Edit</h2>

    <?php if (isset($test)): ?>
      <?php if ($test == true): ?>
        <div class="alert alert-info">
          <strong>Запись обновлена.</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          <strong>Ошибка обновления!</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($news)): ?>
      <form method="POST" action="newsEditResult?id=<?= (int)$news['id'] ?>" enctype="multipart/form-data">
        <table class="table table-bordered table-responsive">

          <tr>
            <td>Title</td>
            <td><input type="text" name="title" class="form-control"
                       value="<?= htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') ?>" required></td>
          </tr>

          <tr>
            <td>Text</td>
            <td><textarea name="text" class="form-control" rows="6" required><?= htmlspecialchars($news['text'], ENT_QUOTES, 'UTF-8') ?></textarea></td>
          </tr>

          <tr>
            <td>Category</td>
            <td>
              <select class="form-control" name="idCategory" required>
                <?php foreach ($arr as $cat): ?>
                  <option value="<?= (int)$cat['id'] ?>" <?= ((int)$cat['id'] === (int)$news['category_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>

          <tr>
        <td>Old picture</td>
            <td>
                <?php
                $pic = $news['picture'];

                if (is_resource($pic)) {
                    $pic = stream_get_contents($pic);
                }

                $picText = trim((string)$pic);

                // Если в BLOB лежит URL (после CAST) — выводим как обычный src
                if ($picText !== '' && (str_starts_with($picText, 'http://') || str_starts_with($picText, 'https://') || str_starts_with($picText, '/'))) {
                    echo '<img src="'.htmlspecialchars($picText, ENT_QUOTES, 'UTF-8').'" width="150" alt="">';
                }
                // Иначе считаем, что это реальные байты картинки (BLOB)
                else if (!empty($pic)) {
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'" width="150" alt="">';
                } else {
                    echo '<em>No picture</em>';
                }
                ?>
            </td>
            </tr>

          <tr>
            <td>New picture (optional)</td>
            <td><input type="file" name="picture" class="form-control"></td>
          </tr>

          <tr>
            <td colspan="2">
              <button type="submit" name="save" class="btn btn-primary">Save</button>
              <a class="btn btn-default" href="newsAdmin">Back</a>
            </td>
          </tr>

        </table>
      </form>
    <?php else: ?>
      <div class="alert alert-warning">Новость не найдена.</div>
      <a class="btn btn-default" href="newsAdmin">Back</a>
    <?php endif; ?>

  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>
