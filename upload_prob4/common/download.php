<?
    header("Content-Type: text/html; charset=UTF-8");
    include ( './common.php' );

    $filename = $_GET["filename"];
    $type = $_GET["type"];

    if(empty($filename) || empty($type)) {
        echo "<script>alert('필수 입력 값이 존재하지 않습니다.');history.back(-1);</script>";
        exit();
    }

    $filepath = type_convert($type);
    $filepath .= $filename;

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename={$filename}");

    readfile($filepath);
?>