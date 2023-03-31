<?php  
  $title='Chỉnh sửa loại hàng';
  include_once 'header.php';


?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Chỉnh sửa loại hàng</h6>
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
                                <h3 class="mb-0">Tên loại hàng  </h3>
                            </div>
                        </div>
                    </div>
                    <?php 
                        include('connect.php');
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $sql_ds="select * from loaihanghoa where MaLoaiHang = '$id' ";
                            $ds=$conn->query($sql_ds);
                            if($ds){
                                foreach($ds as $row){
                       
                    ?>
                    <div class="card-body">
                        <form action="" method="POST"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="id">Mã sản phẩm</label>
                                        <span name="id-goods" class="form-control" > <?php echo $row['MaLoaiHang'] ?></span> 
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Tên sản phẩm</label>
                                        <input type="text" name="name-goods" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $row['TenLoaiHang']?>"> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 text-left">
                                    <div class="form-group">
                                        <a href="loai-hang.php" class="btn btn-sm btn-outline-primary">Quay lại <<</a>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-primary" name ="update" value="Lưu lại">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                    <div class="ml-4 mr-4">
                        <?php 
                            if(isset($_POST["update"])){
                                $idgoods= $_GET["id"];
                                $new=$_POST["name-goods"];
                                if(strlen($new)==0)
                                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                                            <strong>Vui lòng nhập tên</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> 
                                        </div>' ;
                                else{
                                    
                                    $sql_update="update loaihanghoa set TenLoaiHang= '$new' where MaLoaiHang='$idgoods'";
                                   
                                    if($conn->query($sql_update)){
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    
                                    else {
                                        echo '<div class="alert alert-warning alert-dismissible " role="alert">
                                                <strong>Không thể chỉnh sửa!</strong> 
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