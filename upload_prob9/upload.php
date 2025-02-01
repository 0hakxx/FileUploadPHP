<?
	header("Content-Type: text/html; charset=UTF-8");

	if ( !empty($_FILES['img']['name']) ) {		
		// 업로드 경로 작업
		$fullPath = realpath(__FILE__);
		$currentFileName = basename(__FILE__);
		$currentPath = str_replace($currentFileName, "", $fullPath);
		$upload_path = $currentPath."/upload/profile/";
		
		$type = $_GET["type"];
		$upload_file_nm_real = $_FILES['img']['name'];
		$file_type = $_FILES['img']['type'];

		if (strpos($file_type, "image/") === false){
			echo("[{\"flag\": \"N\", \"msg\": \"이미지가 아닙니다.\"}]");
			exit;
		}
		
		$file_info = pathinfo($upload_file_nm_real);
		$ext = strtolower($file_info["extension"]);

		// 확장자 검증
		if($ext != "gif" && $ext != "png" && $ext != "jpg") {
			echo("[{\"flag\": \"N\", \"msg\": \"허용된 확장자가 아닙니다.\"}]");
			exit;
		}
		
		// 파일명 랜덤화 작업
		$rand_nm = rand(0000000000,9999999999)+rand(0000000000,9999999999);
		$upload_file_nm_real = "{$type}_{$rand_nm}.{$ext}";
				
		// 이미지 검증 후 업로드
		if (@getimagesize($_FILES["img"]["tmp_name"]) !== false) {
			$size = getimagesize($_FILES["img"]["tmp_name"]);
			
			if($size[0] <= 100 && $size[1] <= 100) {
				$upload_file = $upload_path.$upload_file_nm_real;
				if ( !(move_uploaded_file($_FILES['img']['tmp_name'], $upload_file) ) ) {
					echo("[{\"flag\": \"N\", \"msg\": \"업로드 에러\"}]");
					exit;
				}				
			} else {
				echo("[{\"flag\": \"N\", \"msg\": \"이미지 100x100 사이즈 이하로 업로드 해주세요.\"}]");
				exit;			
			}
			
		} else {
			echo("[{\"flag\":\"N\", \"msg\":\"이미지 파일이 아닙니다.\"}]");
			exit;
		}
		
		// 웹 경로 추출 작업
	    $currentFileName = basename(__FILE__);
		$host = "http://".$_SERVER['HTTP_HOST'];
		$currenetWebPath = str_replace($currentFileName, "", $_SERVER['PHP_SELF']);
		$webUrl = $host.$currenetWebPath;
		
		// 최종 업로드 URL
		$uploadUrl = "{$webUrl}upload/profile/{$upload_file_nm_real}";
		echo("[{\"flag\": \"Y\", \"url\": \"{$uploadUrl}\", \"msg\": \"업로드 성공\"}]");
		
	} else {
		echo("[{\"flag\": \"N\", \"msg\": \"파일을 업로드 하세요.\"}]");
	}
?>

