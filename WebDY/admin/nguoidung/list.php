<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="index.php?act=qlkh"><b>Danh sách người dùng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Mã ND</th>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>User</th>
                                    <th>Password</th>
                                    <th>Địa chỉ</th>
                                    <th>SĐT</th>
                                    <th>Quyền</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($listnd as $nguoidung){
                                        extract($nguoidung);
                                        $role=get_role($nguoidung['role_id']);
                                        $suand="index.php?act=suand&MaND=".$MaND;
                                        $xoand="index.php?act=xoand&MaND=".$MaND;
                                        echo '<tr>
                                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                        <td>'.$MaND.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$user.'</td>
                                        <td>'.$pass.'</td>
                                        <td>'.$address.'</td>
                                        <td>'.$phonenum.'</td>
                                        <td>'.$role.'</td>
                                        
                                        <td><a href="'.$xoand.'"> <button class="btn btn-primary btn-sm trash" type="button" value="Xóa"
                                                onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> 
                                            </button></a>
                                            <a href="'.$suand.'"><button class="btn btn-primary btn-sm edit" type="button" value="Sửa" id="show-emp" data-toggle="modal"
                          data-target="#ModalUP"><i class="fas fa-edit"></i></button></a>
                                           
                                        </td>
                                    </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

