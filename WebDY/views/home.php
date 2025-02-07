<?php
    $html_dmsp=showdanhmucsp($dmsp);
    $html_spnb='';
    foreach ($spnb as $sp) {
        extract($sp);
        $hinh=$img_path.$Thumbnail;
        $linksp="../index.php?act=prdetail&MaSP=".$MaSP;
        $html_spnb.='<li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="'.$linksp.'" class="link-to-product">
                                    <img src="'.$hinh.'" alt="BanhKem" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="product-title"><a href="'.$linksp.'" class="pr-name">'.$TenSP.'</a></h4>
                                <div class="price ">
                                    <ins><span class="price-amount">'.number_format($Gia,0,",",".").' đ</span></ins>
                                </div>
                            </div>
                        </div>
                    </li>';
    }
?>
<!-- Page Contain -->
<div class="page-contain">

<!-- Main content -->
<div id="main-content" class="main-content">

    <!--Block 01: Main slide-->
    <div class="main-slide block-slider">
        <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
            <li>
                <div class="slide-contain slider-opt03__layout01">
                    <div class="media">
                        <div class="child-elememt">
                            <img src="../assets/images/slide/slide1.png" width="500" height="500" alt="">
                        </div>
                    </div>
                    <div class="text-content">
                        <i class="first-line">Sữa chua cốm</i>
                        <h3 class="second-line">Nhà làm</h3>
                        <p class="third-line">Sự kết hợp giữa sữa chua sánh đặc,chua thanh, ngọt dịu quyện với cốm non dẻo thơm, bùi béo</p>
                        <p class="buttons">
                            <a href="../index.php?act=prdetail&MaSP=80" class="btn btn-bold">Mua ngay</a>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide-contain slider-opt03__layout01">
                    <div class="media">
                    <div class="child-elememt">
                            
                            <img src="../assets/images/slide/slide2.png" width="500" height="500" alt="">
                            
                        </div>
                    </div>
                    <div class="text-content">
                        <i class="first-line">Bánh su sầu riêng</i>
                        <h3 class="second-line">Sầu riêng tự nhiên</h3>
                        <p class="third-line">Sự ra đời của chiếc bánh crepe được làm từ những trái sầu riêng sạch chín tự nhiên</p>
                        <p class="buttons">
                            <a href="../index.php?act=prdetail&MaSP=81" class="btn btn-bold">Mua ngay</a>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide-contain slider-opt03__layout01">
                    <div class="media">
                    <div class="child-elememt">
                            
                            <img src="../assets/images/slide/slide3.png" width="500" height="500" alt="">
                            
                        </div>
                    </div>
                    <div class="text-content">
                        <i class="first-line">Bánh Donut</i>
                        <p class="third-line">Có tạo hình bắt mắt, bánh vàng ươm, thơm, ngon, mềm xốp</p>
                        <p class="buttons">
                            <a href="../index.php?act=prdetail&MaSP=82" class="btn btn-bold">Mua ngay</a>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!--Block 02: Banner-->
    <div class="special-slide">
        <div class="container">
            <ul class="biolife-carousel dots_ring_style" data-slick='{"arrows": false, "dots": true, "slidesMargin": 30, "slidesToShow": 1, "infinite": true, "speed": 800, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":20, "dots": false}},{"breakpoint":480, "settings":{ "slidesToShow": 1}}]}' >
                
                <?php
                            foreach ($spnew as $sp) {
                                extract($sp);
                                $hinh=$img_path.$Thumbnail;
                                $linksp="../index.php?act=prdetail&MaSP=".$MaSP;
                                echo '
                                <li>
                                    <div class="slide-contain biolife-banner__special">
                                        <div class="banner-contain">
                                            <div class="media">
                                                <a href="'.$linksp.'" class="bn-link">
                                                    <figure><img src="'.$hinh.'" width="516" height="384" alt=""></figure>
                                                </a>
                                            </div>
                                            <div class="text-content">
                                                <b class="first-line">'.$TenSP.'</b>
                                                <span class="second-line"></span>
                                                <div class="product-detail">
                                                    <h4 class="product-name">Giá</h4>
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount">'.number_format($Gia,0,",",".").'₫</span></ins>
                                                    </div>
                                                    <div>
                                                    <form action="../index.php?act=addtocart" method="post">
                                                    <input type="hidden" name="MaSP" value="'.$MaSP.'">
                                                    <input type="hidden" name="TenSP" value="'.$TenSP.'">
                                                    <input type="hidden" name="Thumbnail" value="'.$Thumbnail.'">
                                                    <input type="hidden" name="Gia" value="'.$Gia.'">
                                                    <input type="hidden" name="soluong['.$MaSP.']" value="1">
                                                    <input type="submit" name="addtocart" class="btn add-to-cart-btn" value="Thêm vào giỏ hàng">
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>';
                            }
                        ?>
            </ul>
        </div>
    </div>

    <!--Block 03: Product Tab-->
    <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
        <div class="container">

            <div class="biolife-tab biolife-tab-contain sm-margin-top-34px">
                <div class="tab-head tab-head__icon-top-layout icon-top-layout">
                    <ul class="tabs md-margin-bottom-35-im xs-margin-bottom-40-im">
                        <?=$html_dmsp;?>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab01_1st" class="tab-contain active">
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                        <?=$html_spnb;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Block 04: Blog Posts-->
    <div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
        <div class="container">
            <div class="biolife-title-box">
                <span class="subtitle">Tin tức mới và thú vị nhất</span>
                <h3 class="main-title">Đến từ Blog</h3>
            </div>
            <ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
                <li>
                    <div class="post-item effect-01 style-bottom-info layout-02 ">
                        <div class="thumbnail">
                            <a href="../index.php?act=prdetail&MaSP=104" class="link-to-post"><img src="../assets/images/blogpost/blog.jpg" width="370" height="270" alt=""></a>
                            <div class="post-date">
                                <span class="date">20</span>
                                <span class="month">dec</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="post-name"><a href="../index.php?act=prdetail&MaSP=104" class="linktopost">Bông Lan Trứng Muối</a></h4>
                            <div class="post-meta">
                                <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                <div class="post-meta__item post-meta__item-social-box">
                                    <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                    <div class="inner-content">
                                        <ul class="socials">
                                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="excerpt">Bánh bông lan trứng muối là sự kết hợp hoàn hảo đến không ngờ, là sự hoà quyện giữa vị ngọt dịu...</p>
                            <div class="group-buttons">
                                <a href="../index.php?act=prdetail&MaSP=104" class="btn readmore">continue reading</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="post-item effect-01 style-bottom-info layout-02">
                        <div class="thumbnail">
                            <a href="../index.php?act=prdetail&MaSP=129" class="link-to-post"><img src="../images/Tiramisu.jpg" width="370" height="270" alt=""></a>
                            <div class="post-date">
                                <span class="date">16</span>
                                <span class="month">dec</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="post-name"><a href="../index.php?act=prdetail&MaSP=129" class="linktopost">Tiramisu</a></h4>
                            <div class="post-meta">
                                <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                <div class="post-meta__item post-meta__item-social-box">
                                    <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                    <div class="inner-content">
                                        <ul class="socials">
                                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="excerpt">Tiramisu là món bánh tượng trưng cho tình yêu đắm say và đẹp đẽ. Tiramisu có nghĩa là “Pick up me” - “Hãy mang em đi”...</p>
                            <div class="group-buttons">
                                <a href="../index.php?act=prdetail&MaSP=129" class="btn readmore">continue reading</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="post-item effect-01 style-bottom-info layout-02">
                        <div class="thumbnail">
                            <a href="#" class="link-to-post"><img src="../images/SetBanhSU1.jpg" width="370" height="270" alt=""></a>
                            <div class="post-date">
                                <span class="date">15</span>
                                <span class="month">dec</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="post-name"><a href="#" class="linktopost">Set bánh su</a></h4>
                            <div class="post-meta">
                                <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                <div class="post-meta__item post-meta__item-social-box">
                                    <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                    <div class="inner-content">
                                        <ul class="socials">
                                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="excerpt">Bánh su kem có xuất xứ từ nước Pháp, là món bánh ngọt ở dạng kem được làm từ các nguyên liệu bột mì, trứng, bơ,sữa,... </p>
                            <div class="group-buttons">
                                <a href="#" class="btn readmore">continue reading</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>

</div>