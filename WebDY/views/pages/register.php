   <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="../" class="permal-link">Trang chủ</a></li>
                <li class="nav-item"><span class="current-page">Đăng ký</span></li>
            </ul>
        </nav>
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signup-container">
                            <form action="../index.php?act=reg" method="post">
                                <p class="form-row">
                                    <label for="full-name">Fullname:<span class="requite">*</span></label>
                                    <input type="text" name="name">
                                </p>
                                <p class="form-row">
                                    <label for="fid-email">Email:<span class="requite">*</span></label>
                                    <input type="email" name="email">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username:<span class="requite">*</span></label>
                                    <input type="text" name="user">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" name="pass">
                                </p>
                                <p class="form-row wrap-btn">
                                    <input class="btn btn-submit btn-bold" name="dangky" type="submit" value="Đăng ký">
                                    <a href="../index.php?act=login" class="link-to-help">Login now!</a>
                                </p>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </div> 