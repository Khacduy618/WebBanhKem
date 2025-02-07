<div id="main-content" class="main-content">
            <div class="container">
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Đơn hàng của bạn</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Mã đơn hàng</th>
                                        <th class="product-price">Ngày đặt</th>
                                        <th class="product-subtotal">Tổng giá trị</th>
                                        <th class="product-subtotal">Tình trạng đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(is_array($listbill)){
                                                foreach ($listbill as $bill) {
                                                    extract($bill);
                                                    $ttdh=get_ttdh($bill['id_ttr']);
                                                    echo'<tr class="cart_item">
                                                    <td class="product-thumbnail" data-title="Product Name">
                                                        <a class="prd-name">'.$bill['madh'].'</a>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount"><span class="currencySymbol">'.$bill['ngaydathang'].'</ins>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <div class="price price-contain">
                                                            <ins><span class="price-amount"><span class="currencySymbol">'.number_format($bill['total'],0,",",".").' đ</ins>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                    <div class="price price-contain">
                                                        <ins><span class="price-amount"><span class="currencySymbol">'.$ttdh.'</ins>
                                                    </div>
                                                </td>
                                                </tr>';
                                                }
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>