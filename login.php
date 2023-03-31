
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Woder admin | Đăng nhập</title>
  <!-- Favicon -->
  <link rel="icon" href="img/khac/avatar1.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="login.php">
        <img src="img/khac/picw.jpg" width=125 height=200>
      </a>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">


  <!-- <video width="320" height="240" autoplay loop muted>
    <source src="img/videonen.mp4" type="video/mp4">
  </video> -->

  

    <!-- Header -->
    <div class="header bg-gradient-info py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">WELCOM TO WONDER ADMIN</h1>
              <p class="text-lead text-white"><strong><br>>>>> Vui lòng đăng nhập để tiếp tục >>>></strong></p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="100 2560 0 0" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-3 ">
              <div class="text-center text-muted mb-4 pt-2">

                <span>TÀI KHOẢN</span>
              </div>
              <form action="" method="POST" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input name="manv"class="form-control" placeholder="Mã số nhân viên" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Mật khẩu" type="password">
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                    </span>
                  </div>
                </div>
                <div class="text-center">
                  <button name="login" type="submit" class="btn btn-primary my-4">ĐĂNG NHẬP >>></button>
                </div>
              </form>
            </div>
            <div class="pl-3 pr-3">
              <?php 

                session_start(); 
                // session: ghi nhớ những tài khoản đã login trong lần đăng nhập hay chuyển hướng vào mục mới
                include('connect.php');
                if(isset($_POST['login'])){
                  $manv=$_POST['manv'];
                  $pass=$_POST['password'];
                  if(!$manv||!$pass){
                    echo'<div class="alert alert-warning alert-dismissible " role="alert">
                            <strong>Vui lòng nhập thông tin!</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>' ;
                    exit;
                  }else{
                     $sql = "SELECT MSNV,HoTenNV,NVpass FROM NhanVien WHERE MSNV='$manv'";
                     $result=$conn->query($sql);
                    //  Câu lệnh trên dùng nối kết đến csdl
                      if($result->num_rows==0){
                        echo '<div class="alert alert-warning alert-dismissible " role="alert">
                                <strong>Mã nhân viên không tồn tại!</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>' ;
                        exit;
                      }else{
                        $row=$result->fetch_assoc();
                        if($row['NVpass']!=$pass)
                          echo '<div class="alert alert-warning alert-dismissible " role="alert">
                                <strong>Mật khẩu không đúng!</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>' ;
                        else{
                          $_SESSION['manv']=$row['MSNV'];
                          $_SESSION['tennv']=$row['HoTenNV'];
                          header('location:profile.php');
			                    exit;
                        }
                      }
                  }
                 
                }
                $conn->close();
              ?>
            </div>
            
          </div>
          

        </div>
      </div>
    </div>
  </div>
 
  <!-- Argon Scripts -->
  <script> src="assets/js/scriptlogin.js"</script>
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="./assets/js/scriptlogin.js"></script>
  <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

</html>