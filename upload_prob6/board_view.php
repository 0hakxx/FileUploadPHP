<?
	@session_start();
	header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<?
	$idx = $_GET['idx'];
	
	if (empty($idx)) {
		echo "<script>alert(\"값이 정상적으로 전달되지 않았습니다.\");location.href='board.php';</script>";	
		exit;
	}
	
	if ($idx == "1") {
		$title = "웹 관리 콘솔페이지 오픈!";
		$date = "2015-04-13";
		$content = "안녕하세요.<br>	관리자 입니다.<br>CreHackTive 웹 관리 콘솔입니다.<br>점차 많은 업데이트 진행 예정이니 많은 관심부탁드립니다.<br>감사합니다.";
	} else if($idx == "2") {
		$title = "현재 메뉴 확장중입니다...";
		$date = "2015-04-13";
		$content = "안녕하세요.<br>	관리자 입니다.<br>현재 메뉴 확장중입니다...<br>MyPage 란 메뉴가 오픈 되었으며 해당 메뉴를 통하여 개인정보를 열람할 수 있습니다.<br>감사합니다.<br>";
	} else if($idx == "3") {
		$title = "Beta 테스트 기간 입니다.";
		$date = "2015-04-13";
		$content = "안녕하세요.<br>	관리자 입니다.<br>현재 Beta 테스트 기간입니다.<br>해당 기간동안 사용시 불편한점 혹은 사이트 관련 버그가 있을 경우 관리자에게 문의 부탁드립니다.<br>감사합니다.<br>";
	} else {
		$RemoteIp = $_SERVER["REMOTE_ADDR"];
		$content = "<script>alert(\"당신의 IP가 기록 됩니다. 주의하세요. ($RemoteIp)\");location.href='board.php';</script>";
	}
?>

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
		<table class="table">
			<thead>
			<tr>
				<td><h3><?=$title?></h3></td>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><li>작성일 : <?=$date?></li></td>
			</tr>
			<tr>
				<td><li>내용 : </li>
				<?=$content?>
				</td>
			</tr>
			<tr>
				<td align="center"><button type="button" class="btn btn-primary" onclick="location.href='index.php'">목록</button></td>
			</tr>		
			</tbody>
		</table>
		</div>
		</div>
	
      <footer class="footer">
        <p>&copy; Company 2017 CreHackTive Korea</p>
      </footer>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
	    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
