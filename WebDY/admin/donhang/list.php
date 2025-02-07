<main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="index.php?act=bill"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row element-button">
                <div class="col-sm-2">
  
                  <a class="btn btn-add btn-sm" href="#" title="Thêm"><i class="fas fa-plus"></i>
                    Tạo mới đơn hàng</a>
                </div>
                
              </div>
              <form action="index.php?act=bill" method="post">
                            <input type="text" name="kyw" class="input-search" placeholder="Nhập mã đơn hàng">
                            <input type="submit" name="listLoc" class="btn btn-add btn-sm" value="Lọc">
                            
                          </form>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="10"><input type="checkbox" id="all"></th>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th>Tính năng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      foreach ($listbill as $bill) {
                        extract($bill);
                        $suadh="index.php?act=suadh&id=".$id;
                        $xoadh="index.php?act=xoadh&id=".$id;
                        $ttdh=get_ttdh($bill['id_ttr']);
                        echo'<tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>'.$bill['madh'].'</td>
                        <td>'.$bill['nguoidat_ten'].'</td>
                        <td>'.$bill['ngaydathang'].'</td>
                        <td>'.number_format($bill['total'],0,",",".").' đ</td>
                        <td><span class="badge bg-success">'.$ttdh.'</span></td>
                        <td><a href="'.$xoadh.'"> <button class="btn btn-primary btn-sm trash" type="button" value="Xóa"
                        onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> 
                    </button></a>
                    <a href="'.$suadh.'"><button class="btn btn-primary btn-sm edit" type="button" value="Sửa" id="show-emp" data-toggle="modal"
  data-target="#ModalUP"><i class="fas fa-edit"></i></button></a></td>
                      </tr>';
                      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>