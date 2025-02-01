<? include_once("./inc/common.php"); ?>
<?
	header("Content-Type: text/html; charset=UTF-8");

	$filename = $_GET["file"];
	$menu = $_COOKIE["menu"];
	$filepath = "{$filePath}/{$menu}/{$filename}";

    if(strpos($filename, "/") !== false || strpos($filename, "..") !== false || strpos($filename, "\\") !== false) {
        echo "<script>alert('허용되지 않은 문자가 포함되었습니다.');history.back(-1);</script>";
        exit();
    }

		
	if(is_file($filepath)) {
		$path_parts = pathinfo($filepath);
		$filesize = filesize($filepath);
		header("Pragma: public");
		header("Expires: 0");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: $filesize");

		readfile($filepath);
	} else {
		print("<script>alert(\"해당 파일이 존재 하지 않습니다.\");history.back(-1);</script>");
		exit;
	}

?>