<?php 
    $title='Hàng hóa';
    include_once 'header.php';

    
?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-5">
              <h6 class="h2 text-white d-inline-block mb-0">SẢN PHẨM</h6>
            </div>
            <div class="col-lg-6 col-7 text-right">
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="them-hang-hoa.php" >
                      <div class="media align-items-center">
                          <span class="btn btn-sm btn-neutral">
                              <i class="ni ni-fat-add text-blue"></i> THÊM SẢN PHẨM
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
                <thead class="thead-info">
                  <tr>
                    <th scope="col" class="sort table-info" data-sort="name" style="font-size:20; color:black; background:aqua"><strong>Mã sản phẩm</strong></th>
                    <th scope="col" class="sort table-info" data-sort="name" style="font-size:20; color:black; background:aqua"><strong>Tên sản phẩm</strong></th>
                    <th scope="col" class="sort table-info" data-sort="name"style="font-size:20; color:black; background:aqua"><strong>Mã loại sản phẩm</strong></th>
                    <th scope="col" class="sort table-info" data-sort="status"style="font-size:20; color:black; background:aqua"><strong>Số lượng</strong></th>
                    <th scope="col" class="sort table-info" data-sort="budget"style="font-size:20; color:black; background:aqua"><strong>Giá (đồng)</strong></th>
                    <th scope="col" class="sort table-info" data-sort="status"style="font-size:20; color:black; background:aqua"><strong>Tình trạng</strong></th>
                    <th scope="col" class="table-info" style="background:aqua"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                    include('connect.php');
                    if(isset($_GET['page']))
                      $page=$_GET['page'];
                    else 
                      $page=1;
                    //Phân trang
                    $row_per_page=10; //số sản phẩm mỗi trang
                    $start_row = $page*$row_per_page - $row_per_page; //bắt đầu tại
                    $total_row = $conn->query("select * from hanghoa")->num_rows; //tổng số sản phẩm
                    $total_page= ceil( $total_row/$row_per_page); //tổng số trang
                    $list_page=" "; 

                    //trang trước đó
                    $pre_page=$page-1;
                    if($pre_page==0)
                      $list_page='<li class="page-item disabled"> 
                                  <a class="page-link" href="hang-hoa.php?page='.$pre_page.'" tabindex="-1"><i class="fa fa-angle-left"></i>
                                  <span class="sr-only">Trang trước</span></a>
                                </li>';
                    else
                      $list_page='<li class="page-item "> 
                                  <a class="page-link" href="hang-hoa.php?page='.$pre_page.'" tabindex="-1"><i class="fa fa-angle-left"></i>
                                  <span class="sr-only">Trang trước</span></a>
                                </li>';
                                
                    if($page-1 > 1){
                      $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page=1">1</a></li>';
                      if($page-1 > 2)
                       $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                    }
                    $start= ($page-1 <1)?1:$page-1;
                    $end=($page+1 >$total_page)?$total_page:$page+1;
                    for($i=$start;$i<=$end;$i++){
                      if($i==$page)
                        $list_page.='<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';
                      else
                        $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($page+1<$total_page-1){
                      $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                    }
                    if($page+1<$total_page)
                      $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.$total_page.'">'.$total_page.'</a></li>';
                   
                    //Trang kế tiếp
                    $next_page=$page+1;
                    if($next_page>$total_page)
                      $list_page.='<li class="page-item disabled"> 
                                  <a class="page-link" href="hang-hoa.php?page='.$next_page.'" tabindex="-1"><i class="fa fa-angle-right"></i>
                                  <span class="sr-only">Trang sau</span></a>
                                </li>';
                    else
                      $list_page.='<li class="page-item "> 
                                  <a class="page-link" href="hang-hoa.php?page='.$next_page.'" tabindex="-1"><i class="fa fa-angle-right"></i>
                                  <span class="sr-only">Trang sau</span></a>
                                </li>';

                    $sql_ds="select * from hanghoa limit $start_row, $row_per_page";
                    $ds=$conn->query($sql_ds);
                    while($row=$ds->fetch_assoc()){
                    
                  ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                          <span class="name mb-0 text-sm">
                            <?php echo $row["MSHH"]; ?>
                          </span>
                      </div>
                    </th>
                    <th>
                      <span class="name">
                      <a href="chi-tiet-hang-hoa.php?id=<?php echo $row["MSHH"]; ?>"><?php echo $row["TenHH"]; ?></a>
                      </span>
                    </th>
                    <th>
                      <span class="name"><?php echo $row["MaLoaiHang"]; ?></span>
                    </th>
                    <td>
                        <span class="status"><?php echo $row["SoLuongHang"]; ?></span>
                    </td>
                    <td>
                        <span class="budget"><?php echo $row["Gia"]; ?></span>
                    </td>
                    <td>
                      <?php
                        if( $row["TinhTrang"]==0)
                          echo
                            '<span class="badge badge-dot mr-4">
                              <i class="bg-warning"></i>
                              <span class="status">Ngừng bán</span>
                            </span>';
                        else if ($row["TinhTrang"]==1){
                          if($row["SoLuongHang"]==0)
                            echo
                              '<span class="badge badge-dot mr-4">
                              <i class="bg-danger"></i>
                              <span class="status">Hết hàng</span>
                              </span>';

                          else
                            echo
                            '<span class="badge badge-dot mr-4">
                            <i class="bg-success"></i>
                            <span class="status">Đang bán</span>
                            </span>';
                          
                        }
                      ?>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="chi-tiet-hang-hoa.php?id=<?php echo $row["MSHH"]; ?>">Xem & chỉnh sửa</a>
                          <form action="" method="POST">
                            <input type="hidden" name="mahh" value="<?php echo $row["MSHH"]?>" >
                            <input type="hidden" name="tinhtrang" value="<?php echo $row["TinhTrang"]?>" >
                            <?php 
                              if( $row["TinhTrang"]==1)
                                echo '<input type="submit" class="dropdown-item" name="block" value="Ngừng bán">';
                              else
                                echo '<input type="submit" class="dropdown-item" name="block" value="Mở bán">';
                            ?>
                          </form>
                        </div>
                      </div>
                    </td>
                    <?php 
                       }
                    ?>
                  </tr>
                </tbody>
              </table>
            </div>

            <?php
              if(isset($_POST["mahh"])){
                $id=$_POST["mahh"];
                $status=$_POST["tinhtrang"];
                if($status==1)
                  $sql_update="update hanghoa set TinhTrang='false' where MSHH='$id'";
                else
                  $sql_update="update hanghoa set TinhTrang='1' where MSHH='$id'";
                if($conn->query($sql_update)){
                  echo "<meta http-equiv='refresh' content='0'>";
                }
                else 
                  echo "Error description: " . $conn -> error ;
              }
            ?>
          
            
            
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    
                    <?php echo $list_page ?>
                   
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> 

    
<?php 
  $conn->close();
  include_once 'footer.php';
?>