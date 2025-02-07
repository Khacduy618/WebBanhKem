   <!--Navigation section-->
   <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page">Quên mật khẩu</span></li>
            </ul>
        </nav>
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signup-container">
                            <form action="../index.php?act=quenmk" method="post">
                                <p class="form-row">
                                    <label for="fid-email">Email:<span class="requite">*</span></label>
                                    <input type="email" name="email">
                                </p>
                                <p class="form-row wrap-btn">
                                    <input class="btn btn-submit btn-bold" name="gui" type="submit" value="Gửi">
                                    <a href="../index.php?act=login" class="link-to-help">Login now!</a>
                                </p>
                            </form>
                            <?php    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                            ?>
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </div> 