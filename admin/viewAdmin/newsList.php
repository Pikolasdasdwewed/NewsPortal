<?php ob_start(); ?>

<h2>News List</h2>

<div class="container" style="min-height:400px;">
  <div style="margin:20px;">
    <a class="btn btn-primary" href="newsAdd" role="button">Добавить новость</a>
  </div>

  <div class="col-md-11">
    <table class="table table-bordered table-responsive">
      <tr>
        <th width="10%">ID</th>
        <th width="55%">Title</th>
        <th width="15%">Category</th>
        <th width="20%">Actions</th>
      </tr>

      <?php if (!empty($arr)): ?>
        <?php foreach ($arr as $row): ?>
          <tr>
            <td><?= (int)$row['id'] ?></td>
            <td><?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($row['category_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
            <td>
              <a href="newsEdit?id=<?= (int)$row['id'] ?>">Edit</a>
              &nbsp; | &nbsp;
              <a href="newsDelete?id=<?= (int)$row['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>

    </table>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>
