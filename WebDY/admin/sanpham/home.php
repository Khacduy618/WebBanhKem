<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="index.php?act=qlsp"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="index.php?act=qlsp" method="post">
                        <div class="row element-button">
                           
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="index.php?act=addsp" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                          </div>
                            <input type="text" class="input-search" name="kyw" placeholder="Tìm kiếm...">
                            <select name="DM_ID">
                                <option value="0" selected>Tất cả</option>
                                <?php 
                                    foreach ($listdm as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="'.$DM_ID.'">'.$TenDM.'</option>';
                                    }
                                ?>
                                <input type="submit" name="listLoc" class="btn btn-add btn-sm" value="Lọc">
                            </select>
                          
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                    <th>Mô tả</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($danhsachSP as $sanpham ){
                                        extract($sanpham);
                                        $listt=get_tt($sanpham['id_trth']);
                                        $suasp="index.php?act=suasp&MaSP=".$MaSP;
                                        $xoasp="index.php?act=xoasp&MaSP=".$MaSP;
                                        $hinhpath="uploads/".$Thumbnail;
                                        if(is_file($hinhpath)){
                                            $hinh="<img src='".$hinhpath."' height='70'>";
                                        }else{
                                            $hinh="nophoto";
                                        }
                                        echo '
                                        <tr>
                                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                        <td>'.$MaSP.'</td>
                                        <td>'.$TenSP.'</td>
                                        <td>'.$hinh.'</td>
                                        <td>'.$SoLuong.'</td>
                                        <td><span class="badge bg-success">'.$listt.'</span></td>
                                        <td>'.number_format($Gia,0,",",".").' đ</td>
                                        <td>'.$MoTa.'</td>
                                        <td><a href="'.$xoasp.'"><button class="btn btn-primary btn-sm trash" type="button" value="Xóa"><i class="fas fa-trash-alt"></i></button></a>
                                            <a href="'.$suasp.'"><button class="btn btn-primary btn-sm edit" type="button" value="Sửa"><i class="fas fa-edit"></i></button></a>
                                        </td>
                                    </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                            <?php
                                if ($current_page > 3) {
                                    $first_page = 1;
                                    ?>
                                    <li><a class="link-page" href="../admin/index.php?act=qlsp&per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a></li>
                                    <?php
                                }
                                if ($current_page > 1) {
                                    $prev_page = $current_page - 1;
                                    ?>
                                    <li><a class="link-page" href="../admin/index.php?act=qlsp&per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                                <?php }
                                ?>
                                <?php for ($num = 1; $num <= $totalpages; $num++) { ?>
                                    <?php if ($num != $current_page) { ?>
                                        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                            <li><a class="link-page" href="../admin/index.php?act=qlsp&per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a></li>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <li><a class="current-page link-page"><?= $num ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                                <?php
                                if ($current_page < $totalpages - 1) {
                                    $next_page = $current_page + 1;
                                    ?>
                                    <li><a class="link-page" href="../admin/index.php?act=qlsp&per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                                <?php
                                }
                                if ($current_page < $totalpages - 3) {
                                    $end_page = $totalpages;
                                    ?>
                                    <li><a class="link-page" href="../admin/index.php?act=qlsp&per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

