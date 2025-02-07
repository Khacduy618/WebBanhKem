<?php
    if(is_array($nguoidung)){
        extract($nguoidung);
    }
?>
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?act=qlnd">Danh sách nguời dùng</a></li>
        <li class="breadcrumb-item">Cập nhật người dùng</li>
      </ul>
    </div>
    <div class="row">
        <form action="index.php?act=updateuser" method="post">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Cập nhật người dùng</h3>
          <div class="tile-body">
              <div class="form-group col-md-5">
                <label class="control-label">Mã ND </label>
                <input class="form-control" type="number" name="MaND" placeholder="" disabled>
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Họ và tên</label>
                <input class="form-control" type="text" name="name" value="<?php if(isset($name)&&($name!="")) echo $name;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Email</label>
                <input class="form-control" type="text" name="email" value="<?php if(isset($email)&&($email!="")) echo $email;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">User</label>
                <input class="form-control" type="text" name="user" value="<?php if(isset($user)&&($user!="")) echo $user;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Password</label>
                <input class="form-control" type="text" name="pass" value="<?php if(isset($pass)&&($pass!="")) echo $pass;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Địa chỉ</label>
                <input class="form-control" type="text" name="address" value="<?php if(isset($address)&&($address!="")) echo $address;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">SĐT</label>
                <input class="form-control" type="text" name="phonenum" value="<?php if(isset($phonenum)&&($phonenum!="")) echo $phonenum;?>">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Quyền</label>
                <input class="form-control" type="number" name="role_id" value="<?php if(isset($role_id)&&($role_id!="")) echo $role_id;?>">
              </div>

          </div>
            <div class="mb">
                <input type="hidden" name="MaND" value="<?php if(isset($MaND)&&($MaND>0)) echo $MaND;?>">
                <button class="btn btn-save" type="submit" name="Capnhat" value="Cập nhật">Cập nhật</button>
                <a class="btn btn-cancel" href="index.php?act=qlkh">Hủy bỏ</a>
                <a class="btn btn-cancel" href="index.php?act=qlkh">Danh sách</a>
            </div>
        </div>
        <?php
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
    </form>
  </main>