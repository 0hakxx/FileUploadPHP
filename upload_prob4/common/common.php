<?
    header("Content-Type: text/html; charset=UTF-8");

    function type_convert($type) {
        $path = "../upload/";
        if($type == 1) {
            $value = "image";
        } else if($type == 2) {
            $value = "office";
        } else if($type == 3) {
            $value = "pds";
        } else {
            $value = "others";
        }
        return $path.$value."/";
    }
?>