<?
    include_once("./common.php");
    header("Content-Type: text/html; charset=UTF-8");
    $filename = $_GET["filename"];
    $filepath = "{$upload_path}/{$filename}";

    if(empty($filename)) {
        echo "<script>alert('파일명이 존재하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename={$filename}");

    readfile($filepath);

?>