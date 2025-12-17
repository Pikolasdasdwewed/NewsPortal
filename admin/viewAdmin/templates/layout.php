<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>

  <link href="public/css/bootstrap.css" rel="stylesheet">
  <link href="public/css/mystyle.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">

  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/ajaxupload.3.5.js"></script>
</head>
<body>

<div class="container">

  <div class="header clearfix">
    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <?php if (isset($_SESSION['userId'], $_SESSION['sessionId'])): ?>

          <ul class="nav nav-pills pull-right">
            <li>
              <span style="padding-right:10px;">
                <?= htmlspecialchars($_SESSION['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>
              </span>

              <a href="logout" style="display:inline;">
                Выйти <i class="fa fa-sign-out"></i>
              </a>
            </li>
          </ul>

          <?php if (!empty($_SESSION['status']) && $_SESSION['status'] === 'admin'): ?>
            <h4>
              <a href="../" target="_blank" rel="noopener">Web site News portal</a>
              &#187; <a href="./">Start admin</a>
              &#187; <a href="categoryAdmin">News categories</a>
              &#187; <a href="newsAdmin">News List</a>
            </h4>
          <?php else: ?>
            <h4>У вас нет прав!</h4>
          <?php endif; ?>

        <?php else: ?>
          <h4>У вас нет прав!</h4>
        <?php endif; ?>

      </div>
    </nav>
  </div>

  <div id="content" style="padding-top:20px;">
    <?= $content ?? '' ?>
  </div>

  <footer class="footer">
    <p>&copy; 2019 Design Admin dashboard <i class="fa fa-child"></i></p>
  </footer>

</div><!-- /container -->

</body>
</html>
