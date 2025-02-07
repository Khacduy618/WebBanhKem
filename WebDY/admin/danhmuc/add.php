<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?act=qldm">Danh sách danh mục</a></li>
        <li class="breadcrumb-item"><a href="index.php?act=adddm">Thêm loại bánh</a></li>
      </ul>
    </div>
    <div class="row">
        <form action="index.php?act=adddm" method="post">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới loại bánh</h3>
          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-3">
                <label class="control-label">Mã loại </label>
                <input class="form-control" type="number" name="DM_ID" placeholder="" disabled>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tên loại</label>
                <input class="form-control" type="text" name="TenDM">
              </div>
          </div>
          <button class="btn btn-save" type="submit" name="LuuLai" value="Lưu lại">Lưu lại</button>
          <a class="btn btn-cancel" href="index.php?act=qldm">Hủy bỏ</a>
          <a class="btn btn-cancel" href="index.php?act=qldm">Danh sách</a>
        </div>
        <?php
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
    </form>
  </main>