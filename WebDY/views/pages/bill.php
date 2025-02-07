<!-- Main content -->
<div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                <?php if(!empty($error)) { ?>
                    <div id="notify-msg"><?=$error?> <a href="javascript:history.back()">Quay lại</a></div>
                    <?php } elseif (!empty($success)) { ?>
                        <div id="notify-msg"><?=$success?> <a href="../index.php">Tiếp tục mua hàng</a></div>
                    <?php } else {?>
                    <!--checkout progress box-->
                    <form action="../index.php?act=checkout" method="post">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li>
                                    <div class="ttdathang">
                                        <h3 class="title-box">Thông tin người đặt</h3>
                                        <div class="box-content">
                                            <div class="login-on-checkout">
                                                    <?php 
                                                    if (isset($_SESSION['user'])) {
                                                        $name=$_SESSION['user']['name'];
                                                        $address=$_SESSION['user']['address'];
                                                        $email=$_SESSION['user']['email'];
                                                        $phonenum=$_SESSION['user']['phonenum'];
                                                    }else {
                                                        $name="";
                                                        $address="";
                                                        $email="";
                                                        $phonenum="";
                                                    } ?>
                                                    <p class="form-row">
                                                        <label for="input_email">Họ và tên</label>
                                                        <input type="text" name="name" id="name" value="<?=$name?>" placeholder="Nhập họ và tên đầy đủ">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Địa chỉ</label>
                                                        <input type="text" name="address" id="address" value="<?=$address?>" placeholder="Nhập địa chỉ">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Email</label>
                                                        <input type="email" name="email" id="email" value="<?=$email?>" placeholder="Nhập email">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Điện thoại</label>
                                                        <input type="text" name="phone" id="phone" value="<?=$phonenum?>" placeholder="Nhập số điện thoại">
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                <div class="ttdathang">
                                    <a href="javascript:void(0);" onclick="showHideTtnhanhang()">
                                        ⇒ Thay đổi thông tin nhận hàng
                                    </a>
                                    <div class="ttnhanhang">
                                        <div class="box-content">
                                            <div class="login-on-checkout">
                                                    <p class="form-row">
                                                        <label for="input_email">Họ và tên</label>
                                                        <input type="text" name="name_nhan" id="name_nhan" value="" placeholder="Nhập họ và tên đầy đủ">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Địa chỉ</label>
                                                        <input type="text" name="address_nhan" id="address_nhan" value="" placeholder="Nhập địa chỉ">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Điện thoại</label>
                                                        <input type="text" name="phone_nhan" id="phone_nhan" value="" placeholder="Nhập số điện thoại">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>     
                            </ul>
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Tổng đơn hàng</h3>
                                <a href="../index.php?act=viewcart" class="link-forward">Chỉnh sửa giỏ hàng</a>
                            </div>
                            <div class="cart-list-box short-type">
                                <ul class="cart-list">
                                <?php
                                        $conn=pdo_get_connection();
                                        $tong=0;
                                        if(!empty($_SESSION['mycart'])){
                                        $statement = $conn->query("SELECT * FROM sanpham where MaSP in (".implode(",", array_keys($_SESSION['mycart'])).")");
                                        if ($statement) {
                                            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            $count=0;
                                            foreach ($rows as $row) {
                                                if (is_array($row)){
                                                    extract($row);
                                                    $hinh=$img_path.$Thumbnail;
                                                    $link="../index.php?act=prdetail&MaSP=".$MaSP;
                                                    $ttien=$Gia*$_SESSION['mycart'][$MaSP];
                                                    $tong+=$ttien;
                                                    $count += $_SESSION['mycart'][$MaSP];
                                                    $xoasp='<a href="../index.php?act=delcart&MaSP='.$MaSP.'" class="remove"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>';
                                            echo'<li class="cart-elem">
                                                    <div class="cart-item">
                                                        <div class="product-thumb">
                                                            <a class="prd-thumb" href="'.$link.'">
                                                                <figure><img src="'.$hinh.'" width="113" height="113" alt="shop-cart" ></figure>
                                                            </a>
                                                        </div>
                                                        <div class="info">
                                                            <span class="txt-quantity">'.$_SESSION['mycart'][$MaSP].'</span>
                                                            <a href="'.$link.'" class="pr-name">'.$TenSP.'</a>
                                                        </div>
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount">'.number_format($Gia,0,",",".").' đ</span></ins>
                                                        </div>
                                                    </div>
                                            </li>
                                            <input type="hidden" name="MaSP" value="'.$MaSP.'">
                                            <input type="hidden" name="soluong['.$MaSP.']" value="'.$_SESSION['mycart'][$MaSP].'">';}}
                                            echo'<span class="number">'.$count.' items</span>';
                                            }}?>  
                                </ul>
                                <?php echo'<ul class="subtotal">
                                            <li>
                                                <div class="subtotal-line">
                                                    <b class="stt-name">Tổng thanh toán</b>
                                                    <span class="stt-price">'.number_format($tong,0,",",".").' đ</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pttt">
                                                    <div class="boxcart">
                                                        <h3>Phương thức thanh toán: </h3> 
                                                        <input type="radio" name="pttt" value="1" id="" checked>Tiền mặt</br>
                                                        <input type="radio" name="pttt" value="2" id="" checked>Ví điện tử</br>
                                                        <input type="radio" name="pttt" value="3" id="" checked>Chuyển khoản</br>
                                                        <input type="radio" name="pttt" value="4" id="" checked>Thanh toán online</br>
                                                    </div>
                                                </div>
                                            </li>
                                            </ul>'; ?>
                                <button type="submit" name="thanhtoan" style="cursor:pointer">Thanh toán</button>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Ẩn thông tin người nhận khi trang được tải
    $(".ttnhanhang").hide();

    // Xử lý sự kiện khi người dùng nhấn vào liên kết "Thay đổi thông tin nhận hàng"
    function showHideTtnhanhang() {
        if ($(".ttnhanhang").is(":hidden")) {
            // Nếu ẩn, hiển thị thông tin người nhận
            $(".ttnhanhang").slideDown();
        } else {
            // Nếu hiển thị, ẩn thông tin người nhận
            $(".ttnhanhang").slideUp();
        }
    }

    // Gắn sự kiện cho liên kết
    $("a[onclick='showHideTtnhanhang()']").on("click", showHideTtnhanhang);
});
</script>