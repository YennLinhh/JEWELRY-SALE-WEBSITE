<?php 
    $title='Loại hàng';
    include_once 'header.php';


    
    $conn=new mysqli("localhost","root","","shop");
    if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
    
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Loại hàng hóa</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="them-loai-hang.php" role="button" >
                      <div class="media align-items-center">
                          <span class="btn btn-sm btn-neutral">
                              <i class="ni ni-fat-add text-blue"></i>
                              <span > Thêm loại hàng</span> 
                          </span>
                      </div>
                  </a>
                </li>
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
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name" >Mã hàng</th>
                    <th scope="col" class="sort" data-sort="name">Tên hàng</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                
                <tbody class="list">
                  <?php
                    $sql_ds="select * from loaihanghoa";
                    $ds=$conn->query($sql_ds);
                    while($row=$ds->fetch_assoc()){
                    
                  ?>
                  <tr>
                    <td>
                      <a href="">
                        <span >
                          <?php echo $row["MaLoaiHang"]; ?>
                        </span>
                      </a>
                    </td>
                    <td>
                      <span >
                        <?php echo $row["TenLoaiHang"]; ?>
                      </span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <div  class="btn editbtn text-primary "  >
                          <span >Chỉnh sửa</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
              </table>
            </div>
           <!-- Modal chỉnh sửa loại hàng-->
          <div class="modal fade" id="edit-goods-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">Chỉnh sửa loại hàng</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="#" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="name-goods" class="form-control-label">Mã loại hàng </label>
                        <input class="form-control" type="text"  name="id-goods" id="update_id"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="name-goods" class="form-control-label">Tên loại hàng </label>
                        <input class="form-control" type="text" placeholder="Tên loại hàng"  name="name-goods" id="update_name">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" name ="edit">Lưu thay đổi </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
                
           
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
      <script>
        $(document).ready(function(){
          $('.editbtn').on('click',function(){
            $('#edit-goods-modal').modal('show');

              $tr= $(this).closest("tr");
              var data =$tr.children("td").map(function(){
                return $(this).text().trim();
              }).get();
              console.log(data);
              $('#update_id').val(data[0]);
              $('#update_name').val(data[1]);
          });
        });
      </script>                 
<?php require_once 'footer.php';?>