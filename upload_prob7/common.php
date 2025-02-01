<?php
	header("Content-Type: text/html; charset=UTF-8;");

	$tb_name = "tb_board";
	$gubun = "prob7";

	function upload_path_convert($gubun) {
        if($gubun == "board") {
            $value = "up/board/";
        } else if($gubun == "image") {
            $value = "up/image/";
        } else if($gubun == "event") {
            $value = "event/";
        } else {
            $value = "up/etc/";
        }
        return $value;
	}

	function mysql_conn() {
		$host = "127.0.0.1";
		$id = "root";
		$pw = "123456";
		$db = "pentest";
	
		$db_conn = new mysqli($host, $id, $pw, $db);

		return $db_conn;
	}
?>