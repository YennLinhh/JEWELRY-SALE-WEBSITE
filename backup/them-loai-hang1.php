<?php 
  $conn=new mysqli("localhost","root","","shop");

  if($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
  }
      
    if(isset($_POST["insert"])){
        
        $new=$_POST["name-goods"];
        $sql_add="call them_loaihang('$new')";
        $res=$conn->query($sql_add);
        $stt=$res->fetch_assoc();
        if($stt["stt"]==-1){
            echo '<script>aler("vui lòng nhập tên")</script>' ;
            
        }
        else if($stt["stt"]==1){
            echo '<script>aler("thành công")</script>' ;
          header('Location:loai-hang.php');  
         
        }
          
        else {
            echo '<script>aler("that bai")</script>' ;
            header('Location:loai-hang.php');  
        } 
    }
  ?>  