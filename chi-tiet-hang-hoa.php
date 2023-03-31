<?php  
  $title='Chi tiết sản phẩm';
  include_once 'header.php';
    
?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Chi tiết hàng hóa</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include('connect.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql_ds="select * from hanghoa inner join loaihanghoa 
                on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang
                where MSHH = '$id' ";
            $ds=$conn->query($sql_ds);
            if($ds){
                foreach($ds as $row){
        
    ?>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <!--Anh minh hoa-->
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h3 class="mb-0">Ảnh minh họa </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="link" value="<?php echo $row['AnhMinhHoa'] ?>">
                                <img src="<?php echo $row['AnhMinhHoa'] ?>" alt="ảnh sản phẩm" width="220px" >
                            </div>
                            <label class="form-control-label" for="img">Thay đổi ảnh</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="img-upload" >
                            </div>
                        </div>
                    </div>
                </div>    
                <!--Thong tin san pham-->
                <div class="col-lg-7 col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h3 class="mb-0">Thông tin sản phẩm </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="id">Mã sản phẩm</label>
                                            <span name="id" class="form-control" ><?php echo $row['MSHH'] ?> </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="status">Tình trạng</label>
                                            <select class="form-control" name="status">
                                                <option <?php if ($row['TinhTrang']==1) echo 'selected="selected"';  ?> value="1">Đang bán</option>
                                                <option <?php if ($row['TinhTrang']==0) echo 'selected="selected"';  ?> value="0">Ngừng bán</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $row['TenHH'] ?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="goods">Mã loại hàng</label>
                                            <input type="text" name="id-goods" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $row['MaLoaiHang'] ?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="id">Tên loại hàng</label>
                                            <span name="id" class="form-control" ><?php echo $row['TenLoaiHang'] ?> </span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="price">Giá</label>
                                        <input type="price" name="price" class="form-control" placeholder="VND" value="<?php echo $row['Gia'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="quantum">Số lượng</label>
                                        <input type="text" name="quantum" class="form-control" placeholder="Số lượng" value="<?php echo $row['SoLuongHang'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <label class="form-control-label" for="price">Quy cách</label>
                                        <input type="text" name="quycach" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Ghi chú</label>
                                    <textarea name="describe" rows="4" class="form-control" placeholder="Mô tả chi tiết sản phẩm"><?php echo $row['GhiChu'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-6 text-left">
                                    <div class="form-group">
                                        <a href="hang-hoa.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-primary" name="edit-save" value="Lưu thay đổi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
     <?php 
            } 
        }
    }
    ?>    
    </div>

    <?php 
        $id=$_GET['id'];
        if(isset($_POST["edit-save"])){
            $ten=$_POST["name"];
            $status= $_POST['status'];
            $malh=$_POST["id-goods"];
            $gia=$_POST["price"];
            $soluong=$_POST["quantum"];
            $quycach=$_POST["quycach"];
            $ghichu=$_POST["describe"];
            $link=$_POST['link'];
           
            if(strlen($ten)==0||strlen($malh)==0||strlen($gia)==0||strlen($soluong)==0)
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                        <strong>Vui lòng nhập thông tin bắt buộc!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> 
                    </div>' ;
            else if($_FILES['file-upload']['error']>0)
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                        <strong>Không thể tải ảnh</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> 
                    </div>' ;
                else{
                    if(!isset($_FILES['img-upload'])){
                        $link='img/'.$_FILES['img-upload']['name'];
                        move_uploaded_file($_FILES['img-upload']['tmp_name'],$link);
                    }
                    
                    $sql_add="update hanghoa set TenHH='$ten',  QuyCach='$quycach', Gia='$gia', SoLuongHang='$soluong', MaLoaiHang='$malh', GhiChu='$ghichu', AnhMinhHoa='$link', TinhTrang=$status
                                where MSHH='$id'";
                    if($conn->query($sql_add)){
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    
                    else {
                        echo '<div class="alert alert-warning alert-dismissible " role="alert">
                                <strong>Không thể lưu thay đổi!'. $conn-> error.'</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>' ;
                        
                    } 
                }
        }
       
    ?>  
    
<?php  
    $conn->close();
    include_once 'footer.php';
?>