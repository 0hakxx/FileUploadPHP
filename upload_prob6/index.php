<?
	@session_start();
	header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CreHackTive 솔루션 관리 콘솔</title>

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

      <div class="row marketing">
	  <div class="table-responsive">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>NAME</th>
				<th>DATE</th>
				<th>READ</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>3</td>
				<td><a href="board_view.php?idx=3">Beta 테스트 기간 입니다.</a></td>
				<td>관리자</td>
				<td>2015-04-13</td>
				<td align="center">33</td>
			</tr>
			<tr>
				<td>2</td>
				<td><a href="board_view.php?idx=2">현재 메뉴 확장중입니다...</a></td>
				<td>관리자</td>
				<td>2015-04-13</td>
				<td align="center">54</td>
			</tr>
			<tr>
				<td>1</td>
				<td><a href="board_view.php?idx=1">웹 관리 콘솔페이지 오픈!</a></td>
				<td>관리자</td>
				<td>2015-04-13</td>
				<td align="center">71</td>
			</tr>

			</tbody>
		</table>
			<nav align="center">
				<ul class="pagination pagination-sm">
				<li>
				<a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<li class="active"><a href="#">1</a></li>
				<li>
				<a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
				</ul>
			</nav>
		</div>
		</div>
	
      <footer class="footer">
        <p>&copy; Company 2015 CreHackTive Korea</p>
      </footer>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
	    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
