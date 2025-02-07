<?php
    function update_cart($add = false){
        foreach ($_POST['soluong'] as $MaSP => $soluong) {
            if($soluong<=0){
                unset($_SESSION['mycart'][$MaSP]);
            }else{if($add){
                $_SESSION['mycart'][$MaSP]+=$soluong;
            }else{
                $_SESSION['mycart'][$MaSP]=$soluong;
            }
            }
        } 
    }
    function loadcart(){
        $sql="SELECT * FROM sanpham where MaSP in (".implode(",", array_keys($_SESSION['mycart'])).")";
        $listdm=pdo_query($sql);
        return $listdm;
    }
    function bill_insert_id($madh, $MaND, $name, $email, $address, $phonenum, $nguoinhan_ten, $nguoinhan_sdt, $nguoinhan_diachi, $tong, $pttt){
        $sql = "INSERT INTO donhang(madh,id_nd,nguoidat_ten,nguoidat_email,nguoidat_diachi,nguoidat_sdt,nguoinhan_ten,nguoinhan_sdt,nguoinhan_diachi,total,pttt) 
                VALUES ('$madh', '$MaND', '$name', '$email', '$address', '$phonenum', '$nguoinhan_ten', '$nguoinhan_sdt', '$nguoinhan_diachi', '$tong', '$pttt')";
        return pdo_execute_id($sql);
    }
    function insert_cart($string){
        $sql= "INSERT INTO chitietdonhang(id_dh, MaSP, soluong, Gia) VALUES $string";
        pdo_execute($sql);
    }
    function get_tongdonhang() {
        $conn = pdo_get_connection();
        $tong = 0;
    
        if (!empty($_SESSION['mycart'])) {
            // Use prepared statements to prevent SQL injection
            $placeholders = implode(',', array_fill(0, count($_SESSION['mycart']), '?'));
            $sql = "SELECT * FROM sanpham WHERE MaSP IN ($placeholders)";
            
            $statement = $conn->prepare($sql);
    
            if ($statement) {
                $statement->execute(array_keys($_SESSION['mycart']));
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($rows as $row) {
                    if (is_array($row)) {
                        extract($row);
                        $ttien=$Gia*$_SESSION['mycart'][$MaSP];
                        $tong+=$ttien;
                    }return $tong;
                    var_dump($tong);
                }
            }
        }
    }
?>