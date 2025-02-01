<?
    include_once("./common.php");
    header("Content-Type: text/html; charset=UTF-8");

    $db_conn = mysql_conn();
    $idx = $_GET["idx"];
    $upload_path = upload_path_convert($_GET["gubun"]);
    
    if(empty($idx)) {
        echo "<script>alert('값이 입력되지 않았습니다.');history.back(-1);</script>";
        exit();
    }

	$query = "select * from {$tb_name} where idx={$idx}";

	$result = $db_conn->query($query);
    $num = $result->num_rows;
    
	if($num != 0) {
        $row = $result->fetch_assoc();
        $filename = $row["file"];

        if(empty($filename)) {
            echo "<script>alert('파일 다운로드에 실패하였습니다.');history.back(-1);</script>";
            exit();
        }

        $filepath = "{$upload_path}/{$filename}";

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename={$filename}");
    
        @readfile($filepath);
    } else {
        echo "<script>alert('파일 다운로드에 실패하였습니다.');history.back(-1);</script>";
        exit();
    }


?>