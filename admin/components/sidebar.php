<?php 
include "../../url.php";
?>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php $base_url + "mtbs/admin/index.php" ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3 font-weight-bold ">CINEMA<span class="font-weight-bolder">TIC</span> </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase"> Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/movie" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Movies</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/hall" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Theaters</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/genre" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Genres</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/show" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Shows</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/user" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php $base_url + "mtbs/admin/booking" ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="font-weight-bold text-uppercase">Bokings</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            <img class="img-profile rounded-circle" src="<?php echo $page_url ?>img/undraw_profile.svg" />
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            