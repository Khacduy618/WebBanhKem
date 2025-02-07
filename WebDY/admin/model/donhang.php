<?php
    
    function Loadall_bill($kyw="",$MaND=0){
        $sql="select * from donhang where 1";
        if($MaND>0)
        $sql.=" AND id_nd=".$MaND;
        if($kyw!="")
        $sql.=" AND madh like '%".$kyw."%'";
        $sql.=" order by id desc";
        $bill=pdo_query($sql);
        return $bill;
    }
    function delete_bill($id){
        $sql="delete from donhang where id=".$id;
        pdo_execute($sql);
    }
    function update_bill($id, $madh, $ttdh){
        $sql= "update donhang set  madh='".$madh."',id_ttr='".$ttdh."' where id=".$id;
        pdo_execute($sql);
    }
    function loadone_bill($id){
        $sql="select * from donhang where id=".$id;
        $bill=pdo_query_one($sql);
        return $bill;
    }
    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt="Đã thanh toán";
                break;
            case '1':
                $tt="Đang giao";
                break;
            case '2':
                $tt="Đã hủy";
                break;
            case '3':
                $tt="Hoàn thành";
                break;
            default:
                $tt="Đơn hàng mới";
                break;
        }
        return $tt;
    }
    
?>