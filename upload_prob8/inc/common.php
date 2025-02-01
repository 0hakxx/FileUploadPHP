<?
    $db_host = "localhost";
    $db_id = "root";
    $db_pw = "crehacktive";
    $db_name = "pentest";

    $db_conn = new mysqli($db_host, $db_id, $db_pw, $db_name);
        
    if(mysqli_connect_errno()) {
        echo "DB Connection Error";
        exit();
    }

    $tableName1 = "tb_board";
    $gubun = "prob3";
    $filePath = "attach";
?>