<?php
    function insert_nguoidung($name,$user,$email,$pass){
        $sql= "insert into nguoidung(name,user,email,pass) values('$name','$user','$email','$pass')";
        pdo_execute($sql);
    }
    function insert_nguoidung_id($name,$user,$email,$pass,$phonenum,$address){
        $sql= "insert into nguoidung(name,user,email,pass,phonenum,address) values('$name','$user','$email','$pass','$phonenum','$address')";
        return pdo_execute_id($sql);
    }
    function checkuser($user,$pass){
        $conn=pdo_get_connection();
        $stmt= $conn->prepare("SELECT * FROM nguoidung where user='".$user."' AND pass='".$pass."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        if(count($kq)>0)
        return $kq[0]['role_id'];
        else return 0;
    }
    function checkemail($email){
        $sql="select * from nguoidung where email='".$email."'";
        $nguoidung=pdo_query_one($sql);
        return $nguoidung;
    }
    function load_one($user,$pass){
        $sql="select *from nguoidung where user='".$user."' and pass='".$pass."'";
        $nd=pdo_query_one($sql);
        return $nd;
    }
    function loadone_user($MaND){
        $sql="select * from nguoidung where MaND=".$MaND;
        $nguoidung=pdo_query_one($sql);
        return $nguoidung;
    }
     function loadall_user(){
            $sql="select * from nguoidung where 1 order by MaND desc";
            $listnd=pdo_query($sql);
            return $listnd;
     }
    function getuserinfo($user,$pass){
        $conn=pdo_get_connection();
        $stmt= $conn->prepare("SELECT * FROM nguoidung where user='".$user."' AND pass='".$pass."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function update_info($MaND, $name, $user, $pass, $email, $address, $phonenum){
            $sql= "update nguoidung set name='".$name."',user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',phonenum='".$phonenum."' where MaND=".$MaND;
            pdo_execute($sql);
    }
    function delete_user($MaND){
        $sql="delete from nguoidung where MaND=".$MaND;
        pdo_execute($sql);
    }
    function update_user($MaND, $name, $email, $user, $pass, $address, $phonenum, $role_id){
        $sql= "update nguoidung set name='".$name."',user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',phonenum='".$phonenum."', role_id='".$role_id."' where MaND=".$MaND;
        pdo_execute($sql);
    }
    function get_role($n){
        switch ($n) {
            case '0':
                $role="User";
                break;
            case '1':
                $role="Admin";
                break;
            default:
                $role="New User";
                break;
        }
        return $role;
    }
?>