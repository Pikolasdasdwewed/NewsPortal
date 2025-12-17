<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
  <div class="col-md-11">

    <h2>News delete</h2>

    <?php if (isset($test)): ?>

      <?php if ($test == true): ?>
        <div class="alert alert-info">
          <strong>Запись удалена.</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          <strong>Ошибка удаления записи!</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php endif; ?>

    <?php else: ?>

      <form method="POST" action="newsDeleteResult?id=<?php echo (int)$detail['id']; ?>" enctype="multipart/form-data">
        <table class="table table-bordered">

          <tr>
            <td>News title</td>
            <td>
              <input type="text" name="title" class="form-control"
                     value="<?php echo htmlspecialchars($detail['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" readonly>
            </td>
          </tr>

          <tr>
            <td>News text</td>
            <td>
              <textarea rows="5" name="text" class="form-control" readonly><?php
                echo htmlspecialchars($detail['text'] ?? '', ENT_QUOTES, 'UTF-8');
              ?></textarea>
            </td>
          </tr>

          <tr>
            <td>Category</td>
            <td>
              <select name="idCategory" class="form-control" disabled>
                <?php foreach ($arr as $row): ?>
                  <option value="<?php echo (int)$row['id']; ?>" <?php echo ((int)$row['id'] === (int)$detail['category_id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>Old picture</td>
            <td>
              <?php
              $pic = $detail['picture'] ?? '';

              if (is_resource($pic)) {
                  $pic = stream_get_contents($pic);
              }

              $picText = trim((string)$pic);

              // URL в BLOB (твой текущий случай после CAST)
              if ($picText !== '' && (str_starts_with($picText, 'http://') || str_starts_with($picText, 'https://') || str_starts_with($picText, '/'))) {
                  echo '<img src="'.htmlspecialchars($picText, ENT_QUOTES, 'UTF-8').'" width="150" alt="">';
              }
              // Реальный BLOB картинки
              else if (!empty($pic)) {
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($pic).'" width="150" alt="">';
              }
              else {
                  echo '<em>No picture</em>';
              }
              ?>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <button type="submit" class="btn btn-primary" name="save">Удалить</button>
              <a href="newsAdmin" class="btn btn-success">Назад к списку</a>
            </td>
          </tr>

        </table>
      </form>

    <?php endif; ?>

  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>
