<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
  <div class="col-md-11">

    <h2>News Add</h2>

    <?php if (isset($test)): ?>
      <?php if ($test == true): ?>
        <div class="alert alert-info">
          <strong>Запись добавлена.</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          <strong>Ошибка добавления!</strong> <a href="newsAdmin">Список новостей</a>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <form method="POST" action="newsAddResult" enctype="multipart/form-data">
      <table class="table table-bordered table-responsive">
        <tr>
          <td>Title</td>
          <td><input type="text" name="title" class="form-control" required></td>
        </tr>

        <tr>
          <td>Text</td>
          <td><textarea name="text" class="form-control" rows="6" required></textarea></td>
        </tr>

        <tr>
          <td>Category</td>
          <td>
            <select class="form-control" name="idCategory" required>
              <?php foreach ($arr as $cat): ?>
                <option value="<?= (int)$cat['id'] ?>"><?= htmlspecialchars($cat['name'], ENT_QUOTES, 'UTF-8') ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>

        <tr>
          <td>Picture (optional)</td>
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

  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>
