<?php  
  $title='Trang chủ';
  require_once 'header.php';
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-3">Thống kê </h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng đon hàng</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Đã xử lý trong tháng này</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Khách hàng </h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Đã đặt hàng trong tháng này</span>
                  </p>
                </div>
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
                  <h3 class="mb-0">Danh sách đơn hàng đã xác nhận </h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Ngày xác nhận</th>
                    <th scope="col">Tổng tiền</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      ma
                    </th>
                    <td>
                      ngay
                    </td>
                    <td>
                    ngay
                    </td>
                    <td>
                    tong tien
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- Card footer -->
              <div class="card-footer py-4">
                <nav aria-label="...">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
    

  <?php require_once 'footer.php';?>