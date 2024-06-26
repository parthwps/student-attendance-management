<?php
session_start();

require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user details
$query = $db->prepare("SELECT * FROM users WHERE id = :id");
$query->execute(['id' => $_SESSION['user_id']]);
$user = $query->fetch(PDO::FETCH_ASSOC);

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./asset/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./asset/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="./asset/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="./asset/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="./asset/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <form method="POST">
        <button class="nav-link" type="submit" name="logout" style="
        text-decoration: none;
        border: none;
        background-color: transparent;">
        <i class="fas fa-sign-out-alt" style="color: red;"></i>
        </button>
        </from>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./dashboard.php" class="brand-link">
      <img src="./asset/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./asset/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./dashboard.php" class="nav-link 
            <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) {echo "active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./studentsdetails.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'studentsdetails.php') !== false) {echo "active";}?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Students Details
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="./enquiries.php" class="nav-link 
            <?php if (strpos($_SERVER['REQUEST_URI'], 'enquiries.php') !== false) {echo "active";}?>">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
              Enquiries
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="./enquiries.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'enquiries.php') !== false) {echo "active";}?>">
              <i class="nav-icon far fa-envelope"></i>
              <p>
              Enquiries
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./enquiries.php" class="nav-link
                <?php if (strpos($_SERVER['REQUEST_URI'], 'enquiries.php') !== false) {echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiries Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./enquiriefrom.php" class="nav-link
                <?php if (strpos($_SERVER['REQUEST_URI'], 'enquiriefrom.php') !== false) {echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enquiries From</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./studentfrom.php" class="nav-link
                <?php if (strpos($_SERVER['REQUEST_URI'], 'studentfrom.php') !== false) {echo "active";}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student From</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="./attendance.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'attendance.php') !== false) {echo "active";}?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./leaves.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'leaves.php') !== false) {echo "active";}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Leaves
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./fees.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'fees.php') !== false) {echo "active";}?>">
            <i class="nav-icon fas fa-rupee-sign"></i>
              <p>
                Fees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./batch.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'batch.php') !== false) {echo "active";}?>">
            <i class="nav-icon fas fa-th-large"></i>
              <p>
                Batch
                <span class="badge badge-danger right">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./calendar.php" class="nav-link
            <?php if (strpos($_SERVER['REQUEST_URI'], 'calendar.php') !== false) {echo "active";}?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">1</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>