<?php 
    $title='Đơn đặt hàng mới';
    include_once 'header.php';

?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">ĐƠN ĐẶT HÀNG MỚI</h6>
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
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Danh sách đơn hàng chưa xử lý</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name" style="color:black; font-size=25; background:aqua;"><strong>Mã đơn hàng</strong></th>
                    <th scope="col" class="sort" data-sort="name" style="color:black; font-size=25; background:aqua;"><strong>Mã khách hàng</strong></th>
                    <th scope="col" class="sort" data-sort="status"style="color:black; font-size=25; background:aqua;"><strong>Số điện thoại</strong></th>
                    <th scope="col" class="sort" data-sort="status"style="color:black; font-size=25; background:aqua;"><strong>Ngày đặt hàng</strong></th>
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
                    $row_per_page=10;
                    $per_row = $page*$row_per_page - $row_per_page;
                    $total_row = $conn->query("select * from dathang where trangthaidh=0")->num_rows;
                    $total_page= ceil( $total_row/$row_per_page);
                    $list_page=" ";
                    //Trang trước
                    $pre_page=$page-1;
                    if($pre_page==0)
                      $list_page='<li class="page-item disabled"> 
                                  <a class="page-link" href="index.php?page='.$pre_page.'" tabindex="-1"><i class="fa fa-angle-left"></i>
                                  <span class="sr-only">Trang trước</span></a>
                                </li>';
                    else
                      $list_page='<li class="page-item "> 
                                  <a class="page-link" href="index.php?page='.$pre_page.'" tabindex="-1"><i class="fa fa-angle-left"></i>
                                  <span class="sr-only">Trang trước</span></a>
                                </li>';
                    //Danh sách trang

                    if($page-1 > 1){
                      $list_page.='<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>';
                      if($page-1 > 2)
                       $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                    }
                    $start= ($page-1 <1)?1:$page-1;
                    $end=($page+1 >$total_page)?$total_page:$page+1;
                    for($i=$start;$i<=$end;$i++){
                      if($i==$page)
                        $list_page.='<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';
                      else
                        $list_page.='<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($page+1<$total_page-1){
                      $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                    }
                    if($page+1<$total_page)
                      $list_page.='<li class="page-item"><a class="page-link" href="index.php?page='.$total_page.'">'.$total_page.'</a></li>';
                   
                    
                    //Trang sau
                    $next_page=$page+1;
                    if($next_page>$total_page)
                      $list_page.='<li class="page-item disabled"> 
                                  <a class="page-link" href="index.php?page='.$next_page.'" tabindex="-1"><i class="fa fa-angle-right"></i>
                                  <span class="sr-only">Trang sau</span></a>
                                </li>';
                    else
                      $list_page.='<li class="page-item "> 
                                  <a class="page-link" href="index.php?page='.$next_page.'" tabindex="-1"><i class="fa fa-angle-right"></i>
                                  <span class="sr-only">Trang sau</span></a>
                                </li>';

                    $sql_ds="select * from dathang where trangthaidh=0 limit $per_row, $row_per_page";
                    $ds=$conn->query($sql_ds);
                    while($row=$ds->fetch_assoc()){
                    
                  ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $row["SoDonDH"]?></span>
                        </a>
                      </div>
                    </th>
                    <td>
                        <span class="name"><?php echo $row["MSKH"]?></span>
                    </td>
                    <td scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="media-body">
                          <span class="status mb-0 text-sm">sdt</span>
                        </a>
                      </div>
                    </td>
                    <td>
                        <span class="status"><?php echo $row["NgayDH"]?></span>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="xac-nhan-dat-hang.php?madh=<?php echo $row["SoDonDH"]?>">XÁC NHẬN</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
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