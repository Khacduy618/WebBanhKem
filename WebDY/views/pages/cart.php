
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page">Giỏ hàng</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Giỏ hàng của bạn</h3>
                            <form action="../index.php?act=sub" method="POST">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                                            echo'
                                            <tr class="cart_item">
                                                            <td class="product-thumbnail" data-title="Product Name">
                                                                <a class="prd-thumb" href="'.$link.'">
                                                                    <figure><img width="113" height="113" src="'.$hinh.'" alt="shipping cart"></figure>
                                                                </a>
                                                                <a class="prd-name" href="'.$link.'">'.$TenSP.'</a>
                                                                <div class="action">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                    '.$xoasp.'
                                                                </div>
                                                            </td>
                                                            <td class="product-price" data-title="Price">
                                                                <div class="price price-contain">
                                                                    <ins><span class="price-amount">'.number_format($Gia,0,",",".").' đ</span></ins>
                                                                </div>
                                                            </td>
                                                            <td class="product-quantity" data-title="Quantity">
                                                                <input type="text" name="soluong['.$MaSP.']"  value="'.$_SESSION['mycart'][$MaSP].'" min="0" max="100" size="1">
                                                            </td>
                                                            <td class="product-subtotal" data-title="Total">
                                                                <div class="price price-contain">
                                                                    <ins><span class="price-amount">'.number_format($ttien,0,",",".").' đ</span></ins>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                 }}}}
                                        echo'
                                        <tr class="cart_item wrap-buttons">
                                                <td class="wrap-btn-control" colspan="4">
                                                    <a class="btn back-to-shop" href="../index.php?act=product">Back to Shop</a>
                                                    <button class="btn btn-update" type="submit" name="update_click">update</button>
                                                    <button class="btn btn-clear" type="reset"><a href="../index.php?act=viewcart&del=1" style="color:#888888">Xóa tất cả</a></button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <div class="shpcart-subtotal-block">
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal <span class="sub">('.$count.'ittems)</span></b>
                                            <span class="stt-price">'.number_format($tong,0,",",".").'</span>
                                        </div>
                                        <div class="btn-checkout">
                                            <a href="../index.php?act=checkout" class="btn checkout">Check out</a>
                                        </div>
                                        <div class="biolife-progress-bar">
                                            <table>
                                                <tr>
                                                    <td class="mid-position">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>';
                                    ?>
                                    </form>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>