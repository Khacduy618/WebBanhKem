  <!--Navigation section-->
                <?php
                    
                    $html_splienquan='';
                    foreach ($splienquan as $sp) {
                        extract($sp);
                        $img=$img_path.$Thumbnail;
                        $linksp="../index.php?act=prdetail&MaSP=".$MaSP;
                        $html_splienquan.='<li class="product-item">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="'.$linksp.'" class="link-to-product">
                                                        <img src="'.$img.'" alt="dd" width="270" height="270" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h4 class="product-title"><a href="#" class="pr-name">'.$TenSP.'</a></h4>
                                                    <div class="price">
                                                        <ins><span class="price-amount">'.number_format($Gia,0,",",".").' đ</span></ins>
                                                    </div>
                                                    <div class="slide-down-box">
                                                        <p class="message">All products are carefully selected to ensure food safety.</p>
                                                        <div class="buttons">
                                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
                    }
                    extract($onepr);
                    $hinh=$img_path.$Thumbnail;
                ?>
  <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page"><?=$TenSP?></span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain single-product">
        <div class="container">

            <!-- Main content -->
            <div id="main-content" class="main-content">
                
                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                    <img src=<?=$hinh?> alt="" width="500" height="500">
                    </div>
                    <div class="product-attribute">
                        <h3 class="title"><?=$TenSP?></h3>
                        <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>
                            <span class="review-count">(04 Reviews)</span>
                        </div>
                        <p class="excerpt"><?=$MoTa?></p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol"></span><?=number_format($Gia,0,",",".")?> đ</span></ins>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">Giao hàng nhanh</p>
                            <p class="for-today">Nhận ngay hôm nay</p>
                        </div>
                    </div>
                    <form action="../index.php?act=addtocart" method="post">
                        <input type="hidden" name="MaSP" value="<?=$MaSP?>">
                        <input type="hidden" name="TenSP" value="<?=$TenSP?>">
                        <input type="hidden" name="Thumbnail" value="<?=$Thumbnail?>">
                        <input type="hidden" name="Gia" value="<?=$Gia?>">
                        <input type="text" name="soluong[<?=$MaSP?>]" value="1" min="0" max="100" size="1"></br>
                        </br><input type="submit" name="addtocart" class=" product-detail btn add-to-cart-btn" value="Thêm vào giỏ hàng">
                    </form>
                </div>

                <!-- Tab info -->
                <div class="product-tabs single-layout biolife-tab-contain">
                    <div class="tab-head">
                        <ul class="tabs">
                            <li class="tab-element active"><a href="#tab_1st" class="tab-link">Giới thiệu bánh</a></li>
                            <li class="tab-element" ><a href="#tab_2nd" class="tab-link">Thông tin</a></li>
                            <li class="tab-element" ><a href="#tab_3rd" class="tab-link">Vận chuyển và giao hàng</a></li>
                            <li class="tab-element" ><a href="#tab_4th" class="tab-link">Đánh giá <sup>(4.4)</sup></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="tab_1st" class="tab-contain desc-tab active">
                            <p class="desc">là một loại bánh chứa đầy sự êm ái, nhẹ nhàng và sáng tạo. Trong cuộc sống, bánh kem được sử dụng rất nhiều, đem lại những buổi tiệc ấm cúng, những niềm vui, sự hạnh phúc cho mọi người. Bạn đã sẵn sàng để bước vào thế giới của bánh kem với buổi học đầu tiên chưa nào?</p>
                            
                        </div>
                        <div id="tab_2nd" class="tab-contain addtional-info-tab">
                            <table class="tbl_attributes">
                                <tbody>
                                <tr>
                                    <th>Size</th>
                                    <td><p>20, 26, 28</p></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab_3rd" class="tab-contain shipping-delivery-tab">
                            <div class="accodition-tab biolife-accodition">
                                <ul class="tabs">
                                    <li class="tab-item">
                                        <span class="title btn-expand">Sẽ mất bao lâu để nhận được đơn đặt hàng của tôi?</span>
                                        <div class="content">
                                            <p>Các đơn đặt hàng trước 3 giờ chiều theo giờ miền Đông thường sẽ được xử lý và vận chuyển vào ngày làm việc tiếp theo. Đối với các đơn hàng nhận sau 3 giờ chiều, thông thường chúng sẽ được xử lý và vận chuyển vào ngày làm việc thứ hai. Ví dụ: nếu bạn đặt hàng sau 3 giờ chiều ngày thứ Hai thì đơn hàng sẽ được giao vào thứ Tư. Ngày làm việc không bao gồm Thứ bảy, Chủ nhật và tất cả các ngày lễ. Vui lòng cho phép thêm thời gian xử lý nếu đơn hàng của bạn được đặt vào cuối tuần hoặc ngày lễ. Sau khi đơn hàng được xử lý, tốc độ giao hàng sẽ được xác định như sau dựa trên chế độ vận chuyển đã chọn:</p>
                                            <div class="desc-expand">
                                                <span class="title">Chế độ vận chuyển</span>
                                                <ul class="list">
                                                    <li>Tiêu chuẩn (trong quá cảnh 3-5 ngày làm việc)</li>
                                                    <li>Ưu tiên (quá cảnh 2-3 ngày làm việc)</li>
                                                    <li>Chuyển phát nhanh (quá cảnh 1-2 ngày làm việc)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="tab_4th" class="tab-contain review-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                        <div class="rating-info">
                                            <p class="index"><strong class="rating">4.4</strong>out of 5</p>
                                            <div class="rating"><p class="star-rating"><span class="width-80percent"></span></p></div>
                                            <p class="see-all">See all 68 reviews</p>
                                            <ul class="options">
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">5stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span class="percent width-90percent"></span></span>
                                                        </span>
                                                        <span class="number">90</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">4stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span class="percent width-30percent"></span></span>
                                                        </span>
                                                        <span class="number">30</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">3stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span class="percent width-40percent"></span></span>
                                                        </span>
                                                        <span class="number">40</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">2stars</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span class="percent width-20percent"></span></span>
                                                        </span>
                                                        <span class="number">20</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail-for">
                                                        <span class="option-name">1star</span>
                                                        <span class="progres">
                                                            <span class="line-100percent"><span class="percent width-10percent"></span></span>
                                                        </span>
                                                        <span class="number">10</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                        <div class="review-form-wrapper">
                                            <span class="title">Submit your review</span>
                                            <form action="#" name="frm-review" method="post">
                                                <div class="comment-form-rating">
                                                    <label>1. Your rating of this products:</label>
                                                    <p class="stars">
                                                        <span>
                                                            <a class="btn-rating" data-value="star-1" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-2" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-3" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-4" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-5" href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                        </span>
                                                    </p>
                                                </div>
                                                <p class="form-row wide-half">
                                                    <input type="text" name="name" value="" placeholder="Your name">
                                                </p>
                                                <p class="form-row wide-half">
                                                    <input type="email" name="email" value="" placeholder="Email address">
                                                </p>
                                                <p class="form-row">
                                                    <textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..."></textarea>
                                                </p>
                                                <p class="form-row">
                                                    <button type="submit" name="submit">submit review</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- related products -->
                <div class="product-related-box single-layout">
                    <div class="biolife-title-box lg-margin-bottom-26px-im">
                        
                        <span class="subtitle">Tất cả những gì tốt nhất cho bạn</span>
                        <h3 class="main-title">Sản phẩm tương tự</h3>
                    </div>
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        <?=$html_splienquan;?>
                        
                    </ul>
                </div>
                
            </div>
        </div>
    </div>