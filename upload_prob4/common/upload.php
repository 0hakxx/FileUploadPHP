<?
	header("Content-Type: text/html; charset=UTF-8");
	include ( './common.php' );

	$type = $_GET["type"];
	
    if(empty($type)) {
        echo "<script>alert('필수 입력 값이 없습니다.');history.back(-1);</script>";
        exit();
    }

    if(empty($_FILES["userfile"]["name"])) {
        echo "<script>alert('파일을 업로드 하세요!');history.back(-1);</script>";
        exit();
    }

    $filename = $_FILES["userfile"]["name"]; 

    $file_info = pathinfo($path.$filename);
    $ext = $file_info["extension"];

	if($type == 1) {
		$ext_arr = array("jpg", "png", "gif");
		if(!in_array($ext, $ext_arr)) {
			echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
			exit();
		}
	} else if($type == 2) {
		$ext_arr = array("doc", "pptx", "xls");
		if(!in_array($ext, $ext_arr)) {
			echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
			exit();
		}
	} else if($type == 3) {
		$ext_arr = array("txt", "zip", "xml");
		if(!in_array($ext, $ext_arr)) {
			echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
			exit();
		}
	} else {
		$ext_arr = array("php", "html", "");
		if(in_array($ext, $ext_arr)) {
			echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
			exit();
		}
	}

    $filepath = type_convert($type);
    $filepath .= $filename;

    if(!move_uploaded_file($_FILES["userfile"]["tmp_name"], $filepath)) {
        echo "<script>alert('파일 업로드에 실패하였습니다.');history.back(-1);</script>";
        exit();
    }
?>
<script>alert("업로드 성공"); history.back(-1);</script>