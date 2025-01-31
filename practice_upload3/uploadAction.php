<?php include_once("./inc/common.php"); ?>
<?php
    header("Content-Type: text/html; charset=UTF-8");


    if(!empty($_FILES["file"]["name"])) {
        $fileSize = $_FILES["file"]["size"];
		$uploadFile = $_FILES["file"]["name"];
		$uploadPath = "{$filePath}{$gb}/{$uploadFile}";
        
		if(!(@move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath))) {
            echo("<script>alert('파일 업로드를 실패 하셨습니다.');history.back(-1);</script>");
            exit;
        }
        
        
        echo("<script>window.opener.document.getElementById('file').value='{$uploadFile}';window.close();</script>");
    }     
?>