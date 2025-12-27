<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CodeSnape</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS  -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Responsive CSS  -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Ícone  -->
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">

    <!-- Choices  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container container_nav">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img class="img-fluid logo" src="img/horizontal.png" alt="Logo CodeSnape"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <?php if (isset($_SESSION['id'])): ?>
              <li><a href="index.php">My Snippets</a></li>
              <li><a href="?p=novoTrecho">Add</a></li>
              <li><a href="?p=inicialTag">Tags</a></li>
              <li><a href="?p=logout">Logout</a></li>
              <li><a href="?p=deletarConta">Delete Account</a></li>
            <?php else: ?>
              <li><a href="?p=login">Login</a></li>
              <li><a href="?p=cadastro">Register</a></li>
            <?php endif; ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

    <div class="container">
      <?php require "pages/$page.php"; ?>
    </div>




    <div class="footer container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; <span id="getCurrentDate"></span> - Desenvolvido por Thiago Martins </p>
          </div>
        </div>
      </footer>
      
    </div><!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
      var dt = new Date();
      document.getElementById('getCurrentDate').innerHTML = dt.getFullYear();
    </script>
  </body>

</html>