<?
	header("Content-Type: text/html; charset=UTF-8");

	if(empty($_SERVER['HTTP_REFERER'])) {
	  echo("<script>alert('잘못된 접근 입니다.');location.href='index.php'</script> <!--Error : Referer Null-->");
	  exit;
	}

	if ( !empty($_FILES['crehack']['name']) ) {		
		// 업로드할 경로 지정
		$upload_path = './upload/';
		$upload_file_nm_real = $_FILES['crehack']['name'];
		$file_type = $_FILES['crehack']['type'];
		
		$file_info = pathinfo($upload_file_nm_real);
		$file_ext = $file_info["extension"];
		
		$file_realnm = rand(0000000000,9999999999)+rand(0000000000,9999999999);
		$file_realnm .= ".{$file_ext}";
		
		// Full Path
		$upload_file = $upload_path.$file_realnm;
		
		if ( !(move_uploaded_file($_FILES['crehack']['tmp_name'], $upload_file) ) ) {
			echo("<script>alert('파일 업로드를 실패 하셨습니다.')</script>");
		}
		echo "upload/{$file_realnm}";
		
	} else {
		echo("<script>alert('파일을 업로드 하세요.')</script>");
	}
?>