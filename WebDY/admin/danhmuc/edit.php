<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?act=qldm">Danh sách danh mục</a></li>
        <li class="breadcrumb-item"><a href="index.php?act=suadm">Cập nhật loại bánh</a></li>
      </ul>
    </div>
    <div class="row">
        <form action="index.php?act=updatedm" method="post">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Cập nhật loại bánh</h3>
          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-5">
                <label class="control-label">Mã loại </label>
                <input class="form-control" type="number" name="DM_ID" placeholder="" disabled>
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Tên loại</label>
                <input class="form-control" type="text" name="TenDM" value="<?php if(isset($TenDM)&&($TenDM!="")) echo $TenDM;?>">
              </div>
          </div>
            <div class="mb">
                <input type="hidden" name="DM_ID" value="<?php if(isset($DM_ID)&&($DM_ID>0)) echo $DM_ID;?>">
                <button class="btn btn-save" type="submit" name="Capnhat" value="Cập nhật">Cập nhật</button>
                <a class="btn btn-cancel" href="index.php?act=qldm">Hủy bỏ</a>
                <a class="btn btn-cancel" href="index.php?act=qldm">Danh sách</a>
            </div>
        </div>
        <?php
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
    </form>
  </main>