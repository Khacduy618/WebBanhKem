<?php
    session_start();
    ob_start();
    if(isset($_SESSION['role_id'])&&($_SESSION['role_id']==1)){
    include 'model/danhmuc.php';
    include 'model/sanpham.php';
    include 'model/donhang.php';
    include 'model/nguoidung.php';
    include 'model/trangthai.php';
    include 'model/pdo.php';
    include 'header.php';
    include 'menu.php';
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act){
            case 'pmbh':
                include "order/POSbanHang.php";
                break;
                /**********/
            // COntroller Danh mục
            case 'qldm':
                $listdm=loadall_danhmuc();
                include "danhmuc/home.php";
                break;
            case 'adddm':
                if(isset($_POST['LuuLai'])&&($_POST['LuuLai'])){
                    $TenDM=$_POST['TenDM'];
                    insert_danhmuc($TenDM);
                    $thongbao= "Thêm thành công!";
                }
                include "danhmuc/add.php";
                break;
            case 'xoadm':
                if(isset($_GET['DM_ID'])&&($_GET['DM_ID']>0)){
                    delete_danhmuc($_GET['DM_ID']);
                }
                $listdm=loadall_danhmuc();
                    include "danhmuc/home.php";
                    break;
            case 'suadm':
                if(isset($_GET['DM_ID'])&&($_GET['DM_ID']>0)){
                    $dm=loadone_danhmuc($_GET['DM_ID']);
                }
                    include "danhmuc/edit.php";
                    break;
            case 'updatedm':
                if(isset($_POST['Capnhat'])&&($_POST['Capnhat'])){
                    $TenDM=$_POST['TenDM'];
                    $DM_ID=$_POST['DM_ID'];
                    update_danhmuc($DM_ID, $TenDM);
                    $thongbao= "Cập nhật thành công!";
                }
                    $listdm=loadall_danhmuc();
                    include "danhmuc/home.php";
                    break;
                    /**********/
            // Controller Sản Phẩm
            case 'qlsp' :
                if(isset($_POST['listLoc'])&&($_POST['listLoc'])){
                    $kyw=$_POST['kyw'];
                    $DM_ID=$_POST['DM_ID'];
                }else{
                    $kyw="";
                    $DM_ID=0;
                }
                $orderCondition="";
                $orderField= isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort= isset($_GET['sort']) ? $_GET['sort'] : "";
                if(!empty($orderField)&&!empty($orderSort)){
                    $orderCondition="ORDER BY `sanpham`.`".$orderField."` ".$orderSort;
                }
                $item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:15;
                $current_page=!empty($_GET['page'])?$_GET['page']:1;
                $offset = ($current_page-1)*$item_per_page;
                $totalrecord=record();
                $totalpages=ceil($totalrecord/$item_per_page);
                $listdm=loadall_danhmuc();
                $danhsachSP=loadall_product($kyw, $orderCondition, $DM_ID, $item_per_page, $offset);
                include "sanpham/home.php";
                break;
            case 'addsp' :
                if(isset($_POST['LuuLai'])&&($_POST['LuuLai'])){
                    $TenSP=$_POST['TenSP'];
                    $SoLuong=$_POST['SoLuong'];
                    $idtt=$_POST['Trangthai'];
                    $Gia=$_POST['Gia'];
                    $DM_ID=$_POST['DM_ID'];
                    $MoTa=$_POST['MoTa'];
                    $file=$_FILES['Hinhanh']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["Hinhanh"]["name"]);
                    move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], $target_file);
                    insert_sanpham($TenSP,$SoLuong,$idtt,$Gia,$DM_ID,$file,$MoTa);
                    $thongbao= "Thêm thành công!";
                }
                $listtt=loadall_tranghthai();
                $listdm=loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case 'xoasp':
                if(isset($_GET['MaSP'])&&($_GET['MaSP']>0)){
                    delete_sanpham($_GET['MaSP']);
                }
                $danhsachSP=loadall_sanpham("",0);
                include "sanpham/home.php";
                break;
            case 'suasp':
                if(isset($_GET['MaSP'])&&($_GET['MaSP']>0)){
                    $sanpham=loadone_sanpham($_GET['MaSP']);
                }
                $listtt=loadall_tranghthai();
                $listdm=loadall_danhmuc();
                include "sanpham/edit.php";
                break;
            case 'updatesp':
                if(isset($_POST['Capnhat'])&&($_POST['Capnhat'])){
                    $MaSP=$_POST['MaSP'];
                    $TenSP=$_POST['TenSP'];
                    $SoLuong=$_POST['SoLuong'];
                    $idtt=$_POST['Trangthai'];
                    $Gia=$_POST['Gia'];
                    $DM_ID=$_POST['DM_ID'];
                    $MoTa=$_POST['MoTa'];
                    $file=$_FILES['Hinhanh']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["Hinhanh"]["name"]);
                    if (move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["Hinhanh"]["name"])). " has been uploaded.";
                    } else {
                       // echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($MaSP, $TenSP, $SoLuong, $idtt, $Gia, $DM_ID, $MoTa, $file);
                    $thongbao= "Thêm thành công!";
                }
                    $listdm=loadall_danhmuc();
                    $listtt=loadall_tranghthai();
                    $danhsachSP=loadall_sanpham("",0);
                    include "sanpham/home.php";
                    break;
            case 'thoat':
                if(isset($_SESSION['role_id'])) unset($_SESSION['role_id']);
                header('location: login.php');
                break;
                /**********/
            // Controller Người dùng
            case 'qlkh':
                $listnd=loadall_user();
                include "nguoidung/list.php";
                break;
            case 'xoand':
                if(isset($_GET['MaND'])&&($_GET['MaND']>0)){
                    $MaND=$_GET['MaND'];
                    delete_user($MaND);
                }
                $listnd=loadall_user();
                    include "nguoidung/list.php";
                    break;
            case 'suand':
                if(isset($_GET['MaND'])&&($_GET['MaND']>0)){
                    $nguoidung=loadone_user($_GET['MaND']);
                }
                    include "nguoidung/edit.php";
                    break;
            
            case 'updateuser':
                if(isset($_POST['Capnhat'])&&($_POST['Capnhat'])){
                    $MaND=$_POST['MaND'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $address=$_POST['address'];
                    $phonenum=$_POST['phonenum'];
                    $role_id=$_POST['role_id'];
                    update_user($MaND, $name, $email, $user, $pass, $address, $phonenum, $role_id);
                    $thongbao= "Cập nhật thành công!";
                }
                    $listnd=loadall_user();
                    include "nguoidung/list.php";
                    break;
                /**Quản lý đơn hàng **/
            case 'bill':
                    if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                        $kyw=$_POST['kyw'];
                    }else {
                        $kyw="";
                    }
                    $listbill=Loadall_bill($kyw,0);
                    include "donhang/list.php";
                    break;
            case 'xoadh':
                if(isset($_GET['id'])){
                    delete_bill($_GET['id']);
                }
                $listbill=Loadall_bill(0);
                    include "donhang/list.php";
                    break;
            case 'suadh':
                if(isset($_GET['id'])){
                    $bill=loadone_bill($_GET['id']);
                }
                    include "donhang/edit.php";
                    break;
            case 'updatedh':
                if(isset($_POST['Capnhat'])&&($_POST['Capnhat'])){
                    $id=$_POST['id'];
                    $madh=$_POST['madh'];
                    $ttdh=$_POST['ttdh'];
                    update_bill($id, $madh, $ttdh);
                    $thongbao= "Cập nhật thành công!";
                }
                    $listbill=Loadall_bill(0);
                    include "donhang/list.php";
                    break;
                    /****Thống kê***/
            case 'thongke':
                    include "thongke/thongke.php";
                    break;
            default:
                include "home.php";
    }
                }else{
                    include 'home.php';
                    }
    
    include 'footer.php';  
}else{
    header('location: login.php');
}
?>