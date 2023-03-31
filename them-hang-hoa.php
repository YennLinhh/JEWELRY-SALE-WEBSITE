<?php  
  $title='Thêm hàng hóa';
  include_once 'header.php';
?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Thêm sản phẩm</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-11">
                                <h3 class="mb-0">Thông tin  </h3>
                            </div>
                            <div class="col-1">
                            <span class="ni ni-bell-55" data-toggle="tooltip" data-placement="left" title="Mã sản phẩm sẽ được tạo tự động"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Tên sản phẩm</label> 
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span> 
                                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="">  
                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="goods">Mã loại hàng</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span> 
                                            <input type="text" name="id-goods" class="form-control" placeholder="Mã loại hàng" value=""> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="price">Giá</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span> 
                                        <input type="price" name="price" class="form-control" placeholder="VND">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label" for="quantum">Số lượng</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span> 
                                        <input type="text" name="quantum" class="form-control" placeholder="Số lượng" value="">
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Ghi chú</label>
                                            <textarea name="describe" rows="4" class="form-control" placeholder="Mô tả chi tiết sản phẩm"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Ảnh minh họa</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span> 
                                            <div class="custom-file">
                                                <input type="file" class=" form-control" name="file-upload" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <a href="hang-hoa.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-sm btn-primary" name="add" value="Thêm hàng hóa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                            include('connect.php');
                            if(isset($_POST["add"])){
                                $ten=$_POST["name"];
                                $id=$_POST["id-goods"];
                                $gia=$_POST["price"];
                                $soluong=$_POST["quantum"];
                                $quycach=$_POST["quycach"];
                                $ghichu=$_POST["describe"];
                               
                                if(strlen($ten)==0||strlen($id)==0||strlen($gia)==0||strlen($soluong)==0)
                                    echo '<div class="alert alert-warning alert-dismissible" role="alert">
                                            <strong>Vui lòng nhập thông tin bắt buộc</strong>
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
                                        $link='img/'.$_FILES['file-upload']['name'];
                                        move_uploaded_file($_FILES['file-upload']['tmp_name'],$link);
                                        $sql_add="insert into hanghoa (TenHH,  QuyCach, Gia, SoLuongHang, MaLoaiHang, GhiChu, AnhMinhHoa, TinhTrang)
                                                values ('$ten','$quycach','$gia','$soluong','$id','$ghichu','$link',1);";
                                        if($conn->query($sql_add)){
                                            echo '<div class="alert  alert-success alert-dismissible" role="alert">
                                                        <strong>Thêm thành công</strong> 
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>' ;
                                        }
                                        
                                        else {
                                            echo '<div class="alert alert-warning alert-dismissible " role="alert">
                                                    <strong>Không thể thêm!</strong> 
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>' ;
                                            
                                        } 
                                    }
                            }

                        ?>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
<?php 
    $conn->close();
    include_once 'footer.php';
?>