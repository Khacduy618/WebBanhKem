<?php
    function loadall_tranghthai(){
        $sql="SELECT * FROM `trangthai` WHERE 1";
        $listtt=pdo_query($sql);
        return $listtt;
    }
    function get_tt($n){
        switch ($n) {
            case '1':
                $tt="Còn hàng";
                break;
            case '2':
                $tt="Hết hàng";
                break;
            default:
                break;
        }
        return $tt;
    }
?>