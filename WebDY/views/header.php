
 <!-- Preloader -->
 <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a><i class="fa fa-envelope" aria-hidden="true"></i>khacduy584@gmail.com</a></li>
                        <li><a>Free shipping khu vực có bán kính 1km</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                    </ul>
                    <ul class="horizontal-menu">
                        <?php
                            if(isset($_SESSION['user'])&&($_SESSION['user']!="")){
                                extract($_SESSION['user']); ?>
                                <li><a href="../index.php?act=userinfo" class="login-link"><i class="biolife-icon icon-login"></i><?=$user?></a></li>
                                <li><a href="../index.php?act=mybill">Đơn hàng</a></li>
                                <li><a href="../index.php?act=editacc">Cập nhật tài khoản</a></li>
                                <li><a href="../index.php?act=thoat">Thoát</a></li>
                          <?php  }else{
                            ?>                        
                        <li><a href="../index.php?act=login" class="login-link"><i class="biolife-icon icon-login"></i>Đăng nhập/Đăng ký</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="../" class="DY-logo"><img src="../assets/images/DY.png" alt="DY logo" width="100" height="34"></a>
                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                        <?php
                        echo render_menus($menu, $level=0);
                        ?>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                        <form action="../index.php?act=product" class="form-search" name="desktop-seacrh" method="post">
                                            <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                            <input type="text" name="kyw" class="input-text" value="" placeholder="Tìm kiếm...">
                                        <button type="submit" name="timkiem" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                                        </form>
                                </div>
                            </div>
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="../index.php?act=viewcart">
                                            <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                                <span class="qty">
                                                    <?php
                                                        $cart=[];
                                                        if(isset($_SESSION['mycart'])){
                                                            $cart=$_SESSION['mycart'];
                                                        }
                                                        $count=0;
                                                         if (is_array($cart) || is_object($cart)) {
                                                         foreach ($cart as $item => $soluong){
                                                             $count += $soluong;
                                                           }echo $count;
                                                         }
                                                    ?>
                                                </span>
                                            </span>
                                        <span class="title">Giỏ hàng </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-3 col-md-4">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-title">Tất cả danh mục</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                            <?php
                                // echo render_menus_1($mn, $parent_id = 26, $level=0);
                            ?> 
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-12 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="../index.php?act=product" class="form-search" name="desktop-seacrh" method="post">
                                <input type="text" name="kyw" class="input-text" value="" placeholder="Tìm kiếm...">
                                <button type="submit" name="timkiem" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">+84 1253 891</b></p>
                            <p class="working-time">Thứ 2-Thứ 6: 8:30-19:30; Sat-Sun: 9:30-16:30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>