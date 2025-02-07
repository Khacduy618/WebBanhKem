 <!--Navigation section-->
 <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page">Đăng nhập</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="../index.php?act=login" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Username:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="pass" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <input class="btn btn-submit btn-bold" name="dangnhap" type="submit" value="Login">
                                    <a href="../index.php?act=quenmk" class="link-to-help">Forgot your password</a>
                                </p>
                            </form>
                            <?php
                                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                            ?>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="../index.php?act=reg" class="btn btn-bold">Tạo tài khoản</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div> 