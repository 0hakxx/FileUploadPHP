<?
header("Content-Type: text/html; charset=UTF-8");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="././favicon.ico">

    <title>CreHackTive 솔루션 관리 콘솔</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div class="container">
		<form action="upload.php" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="exampleInputFile">파일 업로드</label>
			<input type="file" name="crehack" id="exampleInputFile">
			<p class="help-block">※ 첨부파일을 업로드 하세요.</p>
		  </div>
		  <button type="submit" class="btn btn-danger btn-sm">첨부파일 업로드</button>
		</form>
	</div>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
	    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
	
</html>