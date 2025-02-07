
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?act=qlsp">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item"><a href="index.php?act=addsp">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                    class="fas fa-folder-plus"></i> Thêm danh mục</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                    class="fas fa-folder-plus"></i> Thêm tình trạng</a>
              </div>
            </div>
              <div class="form-group col-md-5">
                <label class="control-label">Mã sản phẩm </label>
                <input class="form-control" type="number" name="MaSP" placeholder="" disabled>
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text" name="TenSP">
              </div>


              <div class="form-group  col-md-5">
                <label class="control-label">Số lượng</label>
                <input class="form-control" type="number" name="SoLuong">
              </div>
              <div class="form-group col-md-5 ">
                <label for="exampleSelect1" class="control-label">Trạng thái</label>
                <select class="form-control" id="exampleSelect1" name="Trangthai">
                <?php 
                    foreach ($listtt as $trangthai) {
                      extract($trangthai);
                      echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select class="form-control" id="exampleSelect1" name="DM_ID">
                  <?php 
                    foreach ($listdm as $danhmuc) {
                      extract($danhmuc);
                      echo '<option value="'.$DM_ID.'">'.$TenDM.'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Giá bán</label>
                <input class="form-control" type="text" name="Gia">
              </div>
              
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <input class="form-control" type="file" name="Hinhanh" id="fileToUpLoad">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="MoTa" col="30" rows="10"></textarea>
              </div>

          </div>
          <button class="btn btn-save" type="submit" name="LuuLai" value="Lưu lại">Lưu lại</button>
          <a class="btn btn-cancel" href="index.php?act=qlsp">Hủy bỏ</a>
        </div>
            <?php
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
    </form>
  </main>