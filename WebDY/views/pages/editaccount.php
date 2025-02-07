   <!--Navigation section-->

   <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page">Cập nhật thông tin</span></li>
            </ul>
        </nav>
        <div class="boxcenter">
        <div id="main-content" class="main-content">
            <div class="container">
                <div class="content-update">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signup-container">
                            <?php
                                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                                    extract($_SESSION['user']);
                                }
                            ?>
                            <form action="../index.php?act=editacc" method="post">
                                <div class="form-row">
                                    <label for="full-name">Fullname:<span class="requite">*</span></label>
                                    <input type="text" name="name" value="<?=$name?>">
                                </div>
                                <div class="form-row">
                                    <label for="fid-email">Email:<span class="requite">*</span></label>
                                    <input type="email" name="email" value="<?=$email?>">
                                </div>
                                <div class="form-row">
                                    <label for="fid-name">Username:<span class="requite">*</span></label>
                                    <input type="text" name="user" value="<?=$user?>">
                                </div>
                                <div class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" name="pass" value="<?=$pass?>">
                                </div>
                                <div class="form-row">
                                    <label for="fid-address">Address:<span class="requite">*</span></label>
                                    <input type="text" name="address" value="<?=$address?>">
                                </div>
                                <div class="form-row">
                                    <label for="fid-tel">Tel:<span class="requite">*</span></label>
                                    <input type="text" name="phonenum" value="<?=$phonenum?>">
                                </div>
                                <div class="form-row wrap-btn">
                                    <input type="hidden" name="MaND" value="<?=$MaND?>">
                                    <input class="btn btn-submit btn-bold" name="capnhat" type="submit" value="Cập nhật">
                                </div>
                            </form>
                            <?php    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                            ?>
                         </div>
                        </div>
                    
                    </div>

                </div>

            </div>

        </div> 
    </div>
    </div>