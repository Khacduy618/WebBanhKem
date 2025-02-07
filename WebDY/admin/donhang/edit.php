<?php
    if(is_array($bill)){
        extract($bill);
        $ttdh=get_ttdh($id_ttr);
    }
?>
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?act=qldm">Đơn hàng</a></li>
        <li class="breadcrumb-item"><a href="index.php?act=suadm">Cập nhật đơn hàng</a></li>
      </ul>
    </div>
    <div class="row">
        <form action="index.php?act=updatedh" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Cập nhật đơn hàng</h3>
          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-3">
                <label class="control-label">Mã đơn hàng</label>
                <input class="form-control" type="text" name="madh" value="<?php if(isset($madh)&&($madh!="")) echo $madh;?>">
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tình trạng đơn hàng</label>
                <input class="form-control" type="text" name="ttdh" value="<?php if(isset($ttdh)&&($ttdh!="")) echo $ttdh;?>">
              </div>
          </div>
            <div class="mb">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
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