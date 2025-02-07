<?php
    function insert_sanpham($TenSP,$SoLuong,$idtt,$Gia,$DM_ID,$file,$MoTa){
        $sql= "insert into sanpham(TenSP, SoLuong, id_trth, Gia, DM_ID, Thumbnail, MoTa) values('$TenSP','$SoLuong','$idtt','$Gia','$DM_ID','$file','$MoTa')";
        pdo_execute($sql);
    }
    function loadall_sanpham($kyw,$DM_ID){
        $sql="select * from sanpham where 1";
        if($kyw!=""){
            $sql.=" and TenSP like '%".$kyw."%'";
        }
        if($DM_ID>0){
            $sql.=" and DM_ID ='".$DM_ID."'";
        }
        $sql.=" order by MaSP desc";
        $danhsachSP=pdo_query($sql);
        return $danhsachSP;
    }
    function loadall_sanpham_home_new($limi){
        $sql="select * from sanpham where 1 order by MaSP desc limit ".$limi;
        $danhsachSP=pdo_query($sql);
        return $danhsachSP;
    }
    function loadall_sanpham_lienquan($DM_ID, $MaSP, $limi){
        $sql="select * from sanpham where DM_ID=? and MaSP<>? order by MaSP desc limit ".$limi;
        $danhsachSP=pdo_query($sql, $DM_ID, $MaSP);
        return $danhsachSP;
    }
    function loadall_spnb($DM_ID, $limi){
        $sql="select * from sanpham where 1";
        if($DM_ID>0){
            $sql .=" and DM_ID=".$DM_ID;
        }
        $sql.=" order by MaSP desc limit ".$limi;
        $danhsachSP=pdo_query($sql);
        return $danhsachSP;
    }
    function loadall_product($kyw, $orderCondition, $DM_ID, $item_per_page, $offset){
        $sql="select * from sanpham where 1";
        if($DM_ID>0){
            $sql .=" and DM_ID=".$DM_ID;
        }
        if($kyw!=""){
            $sql .=" and TenSP like '%".$kyw."%'";
        }
        $sql.=" ".$orderCondition." limit ".$item_per_page." offset ".$offset;
        $danhsachSP=pdo_query($sql);
        return $danhsachSP;
    }
    function record(){
        $conn=pdo_get_connection();
        $sql="select COUNT(*) as TenSP from sanpham";
        $stmt = $conn->query($sql);
        $totalrecord = $stmt->fetchColumn();
        return $totalrecord;
        
    }
    function delete_sanpham($MaSP){
        $sql="delete from sanpham where MaSP=".$MaSP;
        pdo_execute($sql);
    }
    function loadone_sanpham($MaSP){
        $sql="select * from sanpham where MaSP=".$MaSP;
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function update_sanpham($MaSP, $TenSP, $SoLuong, $idtt, $Gia, $DM_ID, $MoTa, $hinh){
        if($hinh!="")
            $sql= "update sanpham set  TenSP='".$TenSP."',SoLuong='".$SoLuong."',id_trth='".$idtt."',Gia = '".$Gia."',DM_ID='".$DM_ID."',MoTa='".$MoTa."',Thumbnail='".$hinh."' where MaSP=".$MaSP;
        else
            $sql= "update sanpham set  TenSP='".$TenSP."',SoLuong='".$SoLuong."',id_trth='".$idtt."',Gia = '".$Gia."',DM_ID='".$DM_ID."',MoTa='".$MoTa."' where MaSP=".$MaSP;
        pdo_execute($sql);
    }
   
?>