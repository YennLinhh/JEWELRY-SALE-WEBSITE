<?php  
  $title='Thêm loại hàng';
  include_once 'header.php';

?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">THÊM LOẠI HÀNG</h6>
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
                            <div class="col-7">
                                <h3 class="mb-0">Tên loại hàng </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name-goods" class="form-control" placeholder="Tên sản phẩm" value=""> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div class="form-group">
                                        <a href="loai-hang.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary" name ="insert">Thêm loại hàng</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="ml-4 mr-4">
                        <?php 
                            include('connect.php');
                            if(isset($_POST["name-goods"])){
                                $new=$_POST["name-goods"];
                                if(strlen($new)==0)
                                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                                            <strong>Vui lòng nhập tên loại hàng</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> 
                                        </div>' ;
                                else{
                                    $sql_add="insert into loaihanghoa (TenLoaiHang) value( '$new')";
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
   
    
<?php require_once 'footer.php';?>