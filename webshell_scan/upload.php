<?
	header("Content-Type: text/html; charset=UTF-8");

	if ( !empty($_FILES['file']['name']) ) {		
		// 업로드 경로 작업
		$fullPath = realpath(__FILE__);
		$currentFileName = basename(__FILE__);
		$currentPath = str_replace($currentFileName, "", $fullPath);
		$upload_path = $currentPath."/upload/";

		$upload_file_nm_real = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
	
		$file_info = pathinfo($upload_file_nm_real);
		$file_ext = $file_info["extension"];
		$file_realnm = $upload_file_nm_real;	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>:: CREHACKTIVE ADMIN PANEL ::</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light">
    <main role="main" class="container">
<?	
		$flag = true;
		$fd = fopen($_FILES['file']['tmp_name'], "rb");
		while($line = fgets($fd, 1000)) {
			if(strpos($line, "Runtime.getRuntime(") !== false || strpos($line, "exec(") !== false) {
				$flag = false;
			}
		}
		if($flag) {
			// 업로드 진행
			$upload_file = $upload_path.$file_realnm;
			if (!(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file))) {
				echo("<div class=\"alert alert-danger\" role=\"alert\">* <strong>업로드 실패!</strong> 관리자에게 문의하세요.</div><center><button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"history.back(-1)\">← 뒤로가기</button></center>");
				exit;
			}	
		}
		
		// 최종 업로드 URL
		$uploadUrl = "upload/{$file_realnm}";
		echo("<div class=\"alert alert-success\" role=\"alert\">* <strong>업로드 성공!</strong> 경로 : {$uploadUrl}</div><center><button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"history.back(-1)\">← 뒤로가기</button></center>");
		
	} else {
		echo("<script>alert('파일을 업로드 하세요.');history.back(-1);</script>");
	}
?>

</main>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#customFile").on('change', function(){  // 값이 변경되면
    
    if(window.FileReader){  // modern browser
      var filename = $(this)[0].files[0].name;
    } else {  // old IE
      var filename = $(this).val().split('/').pop().split('\\').pop();  // 파일명만 추출
    }
    // 추출한 파일명 삽입
    
    $("label[for='fileInput'").text(filename);
  });
});
</script>  
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./js/jquery-slim.min.js"><\/script>')</script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/offcanvas.js"></script>
</body>
</html>
