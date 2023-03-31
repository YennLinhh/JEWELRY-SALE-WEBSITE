<?php  
  $title='Chi tiết đơn đặt hàng đã xử lý';
  include_once 'header.php';
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-3">Chi tiết đơn đặt hàng đã xử lý</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-header border-1">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">Thông tin đơn hàng </h3>
                        </div>
                    </div>
                </div>
                <?php  
                  $ngaydh;
                  include('connect.php');
                  $madh=0;
                  $status=1;
                  if(isset($_GET['madh']))
                    $madh=$_GET['madh'];
                  
                  $sql_dh="select * from DatHang inner join KhachHang 
                            on DatHang.MSKH= KhachHang.MSKH
                            inner join DiaChiKH on KhachHang.MSKH = DiaChiKH.MSKH
                            where SoDonDH='$madh'";
                  $dh=$conn->query($sql_dh);
                  while($row=$dh->fetch_assoc()){
                    $status=$row["TrangThaiDH"];
                    $ngaydh= $row["NgayDH"];
                ?>
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Mã đơn hàng</label>
                              <span id="id" class="form-control" > <?php echo $row["SoDonDH"] ?></span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Tình trạng</label>
                              <span id="id" class="form-control" > <?php echo ($row["TrangThaiDH"]==0)?"Đang chờ xử lý":"Đã giao hàng" ?></span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Ngày đặt hàng</label>
                              <span class="form-control"> <?php echo $row["NgayDH"] ?></span>
                          </div>
                      </div>
                     <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Ngày giao hàng</label>
                              <span class="form-control"> <?php echo $row["NgayGH"]?></span>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Nhân viên xử lý</label>
                              <span class="form-control"> <?php echo $row["MSNV"]?></span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Mã khách hàng</label>
                              <span class="form-control" > <?php echo $row["MSKH"] ?></span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Tên khách hàng</label>
                              <span id="office" class="form-control" > <?php echo $row["HoTenKH"] ?> </span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Số điện thoại</label>
                              <span class="form-control" ><?php echo $row["SoDienThoai"] ?> </span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Email</label>
                              <span id="office" class="form-control" > <?php echo $row["Email"] ?> </span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Địa chỉ </label>
                              <span class="form-control" > <?php echo $row["DiaChi"] ?></span>
                          </div>
                      </div>
                  </div>
                </div>
                <?php
                  }
                  $conn->close();

                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- thong ke -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Danh sách sản phẩm </h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã hàng</th>
                    <th scope="col">Tên hàng</a> </th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $total=0;
                  include('connect.php');
                  $sql_dh="select * from ChiTietDatHang inner join HangHoa 
                            on ChiTietDatHang.MSHH=HangHoa.MSHH where ChiTietDatHang.SoDonDH='$madh' ";
                  $ds_dh=$conn->query($sql_dh);
                  while($row=$ds_dh->fetch_assoc()){
                ?>
                  <tr>
                    <th scope="row">
                      <?php echo $row["MSHH"] ?>
                    </th>
                    <td>
                    <a href="chi-tiet-hang-hoa.php?mahh=<?php echo $row["MSHH"] ?>"><?php echo $row["TenHH"] ?></a>
                    </td>
                    <td>
                      <?php echo $row["GiaDatHang"] ?>  
                    </td>
                    <td>
                      <?php echo $row["SoLuong"] ?>
                    </td>
                    <td>
                    <?php echo $row["GiaDatHang"]* $row["SoLuong"] ?>
                    </td>
                  </tr>
                  <?php
                    $total+=$row["GiaDatHang"]* $row["SoLuong"];
                    }
                    $conn->close();
                  ?>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card-body">
          <div class="row">
              <div class="col-6 text-left">
                  <div class="form-group">
                      <a href="don-dat-hang.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                  </div>
              </div>
              <div class="col-6 text-right pr-2">
                  <h5 class="card-title text-uppercase text-muted mb-2">Tổng thanh toán </h5>
                  <span class="h2 font-weight-bold mb-2 "><?php echo $total ?></span>
              </div>
          </div>
      </div>
    </div>
  <?php require_once 'footer.php';
  ?>