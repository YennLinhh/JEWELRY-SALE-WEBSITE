
 <?php 
    session_start();
    if(!isset($_SESSION['manv'])){
    header('location:login.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?php echo $title ?></title>
    <!-- Favicon -->
    <link rel="icon" href="img/khac/avatar1.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-gray" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="index.php">
                <img src="img/khac/picw.jpg" class="navbar-brand-img" width=100 height=180 alt="brand image">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=1">
                            <i class="ni ni-basket text-black"></i>
                            <span class="nav-link-text" style="color:black"><strong>ĐƠN HÀNG MỚI</strong></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="don-dat-hang.php?page=1">
                            <i class="ni ni-check-bold text-black"></i>
                            <span class="nav-link-text"style="color:black"><strong>ĐƠN HÀNG ĐÃ XỬ LÍ</strong></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="hang-hoa.php?page=1"  >
                            <i class="ni ni-bullet-list-67 text-black"></i>
                            <span class="nav-link-text"style="color:black"><strong>HÀNG HÓA</strong></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loai-hang.php">
                            <i class="ni ni-archive-2 text-black"></i>
                            <span class="nav-link-text"style="color:black"><strong>LOẠI HÀNG</strong></span>
                        </a>
                    </li>
                </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
           
            <div class="navbar-nav align-items-left d-xl-none ml-0  ">
                <a  href="index.php">
                    <img src="img/khac/picw.jpg" class="navbar-brand-img" alt="brand image" width="110px">
                </a>
            </div>
            
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
                </li>
               
            </ul> 
            <!-- Tai khoan-->
            <div class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                
                <div class="nav-item dropdown">
                    <div class="nav-link pr-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="img/khac/avatarYL.png">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">
                                    <?php echo $_SESSION['tennv']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu  dropdown-menu-right " >
                        <div class="dropdown-header ">
                            <h6 class="text-overflow text-center m-0 font-size:50">HELLO!!!</h6> 
                        </div>
                        <a href="profile.php" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Thông tin cá nhân</span>
                        </a>
                        <a href="logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    
    
