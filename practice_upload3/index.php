<?
  header("Content-Type: text/html; charset=UTF-8");
  $taskPage = $_GET["page"];

  $taskPage = str_replace("/", "", $taskPage);
  $taskPage = str_replace("\\", "", $taskPage);
  $taskPage = str_replace(".", "", $taskPage);

  if($taskPage == "") {
    $taskPage = "main.php";
  } else {
    $taskPage = "{$taskPage}.php";
  }
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Awesome Hacking Education</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>
	<script src="./js/common.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="header">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?page=main">CREHACKTIVE EDU</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li <? if($taskPage == "main.php") echo("class=\"active\""); ?>><a href="index.php?page=main">홈</a></li>
            <li <? if($taskPage == "about.php") echo("class=\"active\""); ?>><a href="index.php?page=about">교육소개</a></li>
            <li <? if($taskPage == "list.php") echo("class=\"active\""); ?>><a href="index.php?page=list">문의사항</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      </div>

      <!-- Page Include Start -->
     <? include_once("./{$taskPage}"); ?>


      <!-- Page Include End -->

      <footer class="footer" style="text-align: center">
        <p>&copy; 2017, CreHackTive All rights reserved.</p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
