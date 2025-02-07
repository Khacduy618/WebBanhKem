<?php
    session_start();
    ob_start();
    
    if(!isset($_SESSION['mycart'])){$_SESSION['mycart']=[];}
    $error=false;
    $success=false;
    include "admin/model/pdo.php";
    include "admin/model/giohang.php";
    include "admin/model/donhang.php";
    include "admin/model/sanpham.php";
    include "admin/model/danhmuc.php";
    include "admin/model/nguoidung.php";
    include "views/head.php";
    $menu=menu_home();
    $mn=menu_home1();
    $conn=pdo_get_connection();
    include "views/header.php";
    include "global.php";
    

    $dmsp=loadall_danhmuc_nb();
    $listdanhmuc=loadall_danhmuc();
    $spnew=loadall_sanpham_home_new(4);
    $spnb=loadall_sanpham_home_new(10);
        if((isset($_GET['act']))&&($_GET['act']!="")){
            $act=$_GET['act'];
            switch ($act) {
                case 'login':
                    if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $checkuser=load_one($user,$pass);
                        if(is_array($checkuser)){
                            $_SESSION['user']=$checkuser;
                            header('location: index.php');
                        }else{
                            $thongbao="Tài khoản hoặc mật khẩu không chính xác. Vui lòng nhập lại!";
                        }
                        //  $kq=getuserinfo($user,$pass);
                        //  $role=$kq[0]['role_id'];
                        //  if($role==1){
                        //      $_SESSION['role_id']=$role;
                        //      header('location: admin/index.php');
                        //  }else{
                        //      $_SESSION['role_id']=$role;
                        //      $_SESSION['iduser']=$kq[0]['MaND'];
                        //      $_SESSION['user']=$kq[0]['user'];
                        //      header('location: index.php');
                        }
                        
            
                    include "views/pages/login.php";
                    break;
                case 'quenmk':
                    if(isset($_POST['gui'])&&($_POST['gui'])){
                        $email=$_POST['email'];
                        $checkemail=checkemail($email);
                        if(is_array($checkemail)){
                            $thongbao="Mật khẩu của bạn là: ".$checkemail['pass'];
                        }else{
                            $thongbao="Email này không tồn tại!";
                        }
                    }
                    include "views/pages/pass.php";
                    break;
                case 'thoat':
                    unset($_SESSION['role_id']);
                    unset($_SESSION['iduser']);
                    unset($_SESSION['user']);
                    header('location: index.php');
                    break;
                case 'product':
                    if(!isset($_GET['DM_ID'])){
                        $DM_ID=0;
                    }else{
                        $DM_ID=$_GET['DM_ID'];
                    }
                    //kiểm tra có phải form search không
                    if(isset($_POST['timkiem'])){
                        $kyw=$_POST['kyw'];
                    }else{
                        $kyw="";
                    }
                    $orderCondition="";
                    $orderField= isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort= isset($_GET['sort']) ? $_GET['sort'] : "";
                    if(!empty($orderField)&&!empty($orderSort)){
                        $orderCondition="ORDER BY `sanpham`.`".$orderField."` ".$orderSort;
                    }
                    $item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:9;
                    $current_page=!empty($_GET['page'])?$_GET['page']:1;
                    $offset = ($current_page-1)*$item_per_page;
                    $totalrecord=record();
                    $totalpages=ceil($totalrecord/$item_per_page);
                    $listsanpham=loadall_product($kyw, $orderCondition, $DM_ID, $item_per_page, $offset);
                    include "views/pages/product.php";
                    break;
                case 'aboutus':
                    include "views/pages/aboutus.php";
                    break;
                case 'blog':
                    include "views/pages/blog.php";
                    break;
                case 'contact':
                    include "views/pages/contact.php";
                    break;
                case 'prdetail':
                      if(isset($_GET['MaSP'])&&($_GET['MaSP']>0)){
                        $MaSP=$_GET['MaSP'];
                        $onepr=loadone_sanpham($MaSP);
                        $DM_ID=$onepr['DM_ID'];
                        $splienquan=loadall_sanpham_lienquan($DM_ID, $MaSP, 7);
                        include "views/pages/single.php";
                      }else{
                        include "views/home.php";
                      }
                    
                    break;
                case 'reg':
                    if(isset($_POST['dangky'])&&($_POST['dangky']))
                    {
                        $name=$_POST['name'];
                        $user=$_POST['user'];
                        $email=$_POST['email'];
                        $pass=$_POST['pass'];
                        insert_nguoidung($name,$user,$email,$pass);
                        $thongbao="Đăng ký thành công! Vui lòng đăng nhập!";

                    }
                    include "views/pages/register.php";
                    break;
                    case 'editacc':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $email=$_POST['email'];
                            $address=$_POST['address'];
                            $phonenum=$_POST['phonenum'];
                            $name=$_POST['name'];
                            update_info($MaND, $name, $user, $pass, $email, $address, $phonenum);
                            $_SESSION['user']=load_one($user,$pass);
                            header('location: index.php?act=editacc');
                            
                        }
                        include "views/pages/editaccount.php";
                        break;
                    case 'addtocart':
                        
                        if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                            update_cart(true);
                            header('location: index.php?act=viewcart');
                            
                        }
                        break;
                    case 'sub':
                        if(isset($_POST['update_click'])){
                             update_cart();
                        }
                            header('location: index.php?act=viewcart');
                        break;
                    case 'viewcart':
                        if(isset($_GET['del'])&&($_GET['del']==1)){
                            unset($_SESSION['mycart']);
                            header('location: index.php?act=viewcart');
                        }
                            include "views/pages/cart.php";
                        break;
                    case 'delcart':
                        if(isset($_GET['MaSP'])){
                            unset($_SESSION['mycart'][$_GET['MaSP']]);
                        }
                            header('location: index.php?act=viewcart');
                        
                    break;
                    case 'checkout':
                        if(isset($_POST['thanhtoan'])){
                            if(empty($_POST['name'])){
                                $error="Bạn chưa nhập tên!";
                            }elseif (empty($_POST['address'])) {
                                $error="Bạn chưa nhập địa chỉ!";
                            }elseif (empty($_POST['email'])) {
                                $error="Bạn chưa nhập email!";
                            }elseif (empty($_POST['phone'])) {
                                $error="Bạn chưa nhập số điện thoại! ";
                            }elseif (empty($_POST['soluong'])) {
                                $error="Giỏ hàng rỗng! ";
                            }
                            $name=$_POST['name'];
                            $user="guest".rand(1,999);
                            $email=$_POST['email'];
                            $pass="123456";
                            $address=$_POST['address'];
                            $phonenum=$_POST['phone'];
                            $nguoinhan_ten=$_POST['name_nhan'];
                            $nguoinhan_diachi=$_POST['address_nhan'];
                            $nguoinhan_sdt=$_POST['phone_nhan'];
                            $pttt=$_POST['pttt'];
                            if(isset($_SESSION['user'])){
                                $MaND=$_SESSION['user']['MaND'];
                            }else$MaND=insert_nguoidung_id($name,$user,$email,$pass,$phonenum,$address);
                            $madh="DYcake".$MaND."-".rand(1,1000)."-".date("dmY");
                            if($error==false && !empty($_POST['soluong'])){
                                $conn=pdo_get_connection();
                                if(!empty($_SESSION['mycart'])){
                                $statement = $conn->query("SELECT * FROM `sanpham` WHERE `MaSP` IN (".implode(",", array_keys($_POST['soluong'])).")");
                                if ($statement) {
                                    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                $ttien=0;
                                $tong=0;
                                 foreach ($rows as $row) {
                                    if (is_array($row)){
                                        extract($row);
                                        $soluong=$_POST['soluong'][$MaSP];
                                        $ttien=$Gia*$soluong;
                                       
                            }  $tong+= $ttien;
                        }
                    }
                }
                $id_dh=bill_insert_id($madh, $MaND, $name, $email, $address, $phonenum, $nguoinhan_ten, $nguoinhan_sdt, $nguoinhan_diachi, $tong, $pttt);
                $string="";
                foreach ($rows as $key => $row) {
                            if (is_array($row)){
                                extract($row);
                                $soluong=$_POST['soluong'][$MaSP];
                                
                                $string.="('".$id_dh."', '".$MaSP."', '".$soluong."', '".$Gia."' )";
                                if($key != count($rows)-1){
                                    $string.=", ";
                                }
                    } 
                }   $insertOrDetail=insert_cart($string);
                    $success="Đặt hàng thành công!";
                    unset($_SESSION['mycart']);
    }  
                        }
                        include "views/pages/bill.php";
                        break;
                    case 'mybill':
                        $listbill=Loadall_bill($_SESSION['user']['MaND']);
                        include "views/pages/mybill.php";
                        break;
                default:
                    include "views/home.php";
                    break;
            }
        }else{
            include "views/home.php";
        }
        
    
    include "views/footer.php";
?>