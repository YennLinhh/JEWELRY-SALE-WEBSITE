<meta charset="UTF-8"> 
<?php
    $title='Trang cá nhân';
    include_once 'header.php';
    $manv;
    include('connect.php');
    $manv= $_SESSION['manv'];

    $sql_nv="select * from NhanVien where MSNV='$manv'";
    $nv=$conn->query($sql_nv);
    while($row=$nv->fetch_assoc()){

?>

    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 300px;  background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-primary opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1 class="display-3 text-white">Xin chào <?php echo $row["HoTenNV"]?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                <img src="img/khac/avatarYL.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-7 pt-md-4 pb-0 pb-md-6">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center">
                            <h5 class="h3">
                            <?php echo $row["HoTenNV"]?><span class="font-weight-light"></span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"><?php echo $row["ChucVu"]?></i>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>WONDER TEAM 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <form action="" method="post">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Thông tin liên hệ </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="submit" name="save" class="btn btn-sm btn-primary" value="Lưu thay đổi">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="id">Mã nhân viên</label>
                                            <span name="id" class="form-control" > <?php echo $row["MSNV"]?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control" placeholder="phone" value=" <?php echo $row["SoDienThoai"]?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Địa chỉ</label>
                                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value=" <?php echo $row["DiaChi"]?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    }

    if(isset($_POST["save"])){
        $sdt=trim($_POST['phone']);
        $diachi=trim($_POST['address']);
        $sql_update="update NhanVien set SoDienThoai='$sdt',DiaChi='$diachi' where MSNV='$manv'";
        if($conn->query($sql_update)){
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else 
            echo "Error description: " . $conn -> error ;
    }

    include_once 'footer.php';
?>