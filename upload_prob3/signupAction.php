<?
	header("Content-Type: text/html; charset=UTF-8");

	$email = $_POST["email"];
	$password = $_POST["password"];
	$company = $_POST["company"];
	$username = $_POST["username"];
	
	if(empty($email) || empty($password) || empty($company) || empty($username)) {
		echo("<script>alert('빈칸 없이 모두 작성해주세요.');history.back(-1);</script>");
		exit;
	}
	
	
	if ( !empty($_FILES['customFile']['name']) ) {		
		// 업로드 경로 작업
		$fullPath = realpath(__FILE__);
		$currentFileName = basename(__FILE__);
		$currentPath = str_replace($currentFileName, "", $fullPath);
		$upload_path = $currentPath."/attach/data/profile_img/";
		
		$upload_file_nm_real = $_FILES['customFile']['name'];
		$file_type = $_FILES['customFile']['type'];

		if (strpos($file_type, "image/") === false){
			echo("<script>alert('이미지 파일을 업로드 해주세요.');history.back(-1);</script>");
			exit;
		}
		
		$file_info = pathinfo($upload_file_nm_real);
		$ext = strtolower($file_info["extension"]);

		// 파일명 랜덤화 작업
		//$file_realnm = rand(0000000000,9999999999)+rand(0000000000,9999999999);
		//$file_realnm .= ".{$file_ext}";
				
		// 이미지 검증 후 업로드
		if (@getimagesize($_FILES["customFile"]["tmp_name"]) !== false) {
			$size = getimagesize($_FILES["customFile"]["tmp_name"]);
			
			if($size[0] <= 100 && $size[1] <= 100) {
				$upload_file = $upload_path.$upload_file_nm_real;
				if ( !(@move_uploaded_file($_FILES['customFile']['tmp_name'], $upload_file) ) ) {
					echo("<script>alert('업로드 시 에러가 발생되었습니다.');history.back(-1);</script>");
					exit;
				}				
			} else {
				echo("<script>alert('이미지 100x100 사이즈 이하로 업로드 해주세요.');history.back(-1);</script>");
				exit;	
			}
			
		} else {
			echo("<script>alert('이미지 파일이 아닙니다.');history.back(-1);</script>");
			exit;
		}
		
		// 웹 경로 추출 작업
	    $currentFileName = basename(__FILE__);
		$host = "http://".$_SERVER['HTTP_HOST'];
		$currenetWebPath = str_replace($currentFileName, "", $_SERVER['PHP_SELF']);
		$webUrl = $host.$currenetWebPath;
		
		// 최종 업로드 URL
		$uploadUrl = "{$webUrl}upload/profile/{$upload_file_nm_real}";
		echo("<script>alert('회원가입 신청이 완료되었습니다. 현재는 보류 상태이며, 관리자 승인 후 회원가입 신청이 완료됩니다.');location.href='index.html'</script>");
	} else {
		echo("<script>alert('프로필 사진을 업로드 하세요.');history.back(-1);</script>");
		exit;
	}
?>

