<?php
    $conn=new mysqli("localhost","root","","shop");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
        

   
    
                    
            
?>

<html>
    <form action="" method="post">
        <input type="text" name="name-goods" id="">
        <input type="submit" value="ok">    
        
    </form>
    <?php 
        
        
        if(isset($_POST["name-goods"])){
            $new=$_POST["name-goods"];
            $sql_add="call them_loaihang('$new')";
            $res=$conn->query($sql_add);
            $stt=$res->fetch_assoc();
            if($stt["stt"]==-1)
                echo '<script>aler("vui lòng nhập tên")</script>' ;
            else if($stt["stt"]==1){
                echo '<script>aler("thành công")</script>' ;
            }
               
            else {
                echo '<script>aler("that bai")</script>' ;
               
            }
               
        }
        ?>

    <table>
        <tr>
            <td>id</td>
            <td>Tên</td>
        </tr>
        <?php
            

            $sql_ds="select * from loaihanghoa";
            $ds=$conn->query($sql_ds);
            if($ds){
                foreach($ds as $row){
                  
        ?>
        <tr>
            <td>
                <?php
                    echo $row["MaLoaiHang"];
                ?>
            </td>
            <td>
                <?php
                    echo $row["TenLoaiHang"];
                ?>
            </td>

        </tr>
        <?php 
                }
            }
        ?>
    </table>
</html>


<!-- <td> 

    if($row["TinhTrang"]=1)
    echo "<span class=\"badge badge-dot mr-4\">
        <i class=\"bg-success\"></i>
        <span class=\"status\">Đang bán</span>";
    else
    echo " <span class=\"badge badge-dot mr-4\">
        <i class=\"bg-warning\"></i>
        <span class=\"status\">Ngừng bán</span>
        </span>";



    
             <select class="form-control" name="goods">
             <?php 
                                                //     $sql_ds="select * from loaihanghoa ";
                                                //     $ds=$conn->query($sql_ds);
                                                //     while ($row=$ds->fetch_assoc()){
                                                // ?>
                                                //     <option value="<?php echo $row["MaLoaiHang"]?>"><?php echo $row ["TenLoaiHang"]?></option>;
                                                   
                                                   
                                                // <?php   // } 
                                                ?>
                                            </select>
 </td> 
  <div class="alert alert-success" role="alert">
                        <strong>Thay đổi thành công!</strong> 
                      </div>



 //Danh sách trang
                    if($page==1){
                      $list_page.='<li class="page-item active"><span class="page-link" >1</span></li>';
                      $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.($page+1).'">'.($page+1).'</a></li>';
                      $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                    }
                    else 
                      if($page==$total_page){
                        $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                        $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.($page-1).'">'.($page-1).'</a></li>';
                        $list_page.='<li class="page-item active"><span class="page-link" >'.$total_page.'</span></li>';
                      }
                      else{
                          $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page=1">1</a></li>';
                          if($total_page<=4){
                            for($i=2;$i<$total_page;$i++){
                              if($i==$page)
                                $list_page.='<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';
                              else
                                $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.$i.'">'.$i.'</a></li>';
                            }   
                          }
                          else{
                            if($page==2){
                              $list_page.='<li class="page-item active"><span class="page-link" >'.$page.'</span></li>';
                              $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.($page+1).'">'.($page+1).'</a></li>';
                              $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                            }
                            else {
                              if($page==$total_page-1){
                                $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                                $list_page.='<li class="page-item"><a class="page-link" href="hang-hoa.php?page='.($page-1).'">'.($page-1).'</a></li>';
                                $list_page.='<li class="page-item active"><span class="page-link" >'.$page.'</span></li>';
                              }
                              else{
                                $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                                $list_page.='<li class="page-item active"><span class="page-link" >'.$page.'</span></li>';
                                $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
                              }
                          
                            }
                          }
                          $list_page.='<li class="page-item active"><span class="page-link" >'.$total_page.'</span></li>';
                      }


 -->