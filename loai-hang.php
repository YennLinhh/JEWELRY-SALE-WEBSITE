<?php 
    $title='Loại hàng';
    include_once 'header.php';
    
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
                              <span>THÊM LOẠI HÀNG</span> 
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
                    <th scope="col" class="sort" data-sort="name" style="color:black; font-size=25; background:aqua;"><strong>MÃ SẢN PHẨM</strong></th>
                    <th scope="col" class="sort" data-sort="name" style="color:black; font-size=25; background:aqua;"><strong>TÊN SẢN PHẨM</strong></th>
                    <th scope="col" style="background:aqua"></th>
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
                    $total_row = $conn->query("select * from loaihanghoa")->num_rows; //tổng số sản phẩm
                    $total_page= ceil( $total_row/$row_per_page); //tổng số trang
                    $list_page=" "; 
                    //Trang trước
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
                    //Danh sách trang
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
                   
                    
                    //Trang sau
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



                    $sql_ds="select * from loaihanghoa limit $start_row, $row_per_page";
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
                      <td>
                        <div class="text-right">
                          <a href="chinh-sua-loai-hang.php?id=<?php echo $row["MaLoaiHang"]; ?>" class="btn text-primary " name="edit" > Chỉnh sửa</a>
                        </div>
                      </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
           
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
<?php require_once 'footer.php';?>