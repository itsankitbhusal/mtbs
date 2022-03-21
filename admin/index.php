<?php
require_once __DIR__ . "/./components/admin.php";
include_once __DIR__ . "/./components/header.php";
include_once __DIR__ . "/./components/sidebar.php";

?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 ml-4 mb-4 text-gray-800 font-weight-bold">Admin Dashboard</h1>
  <?php if (hasError()) : ?>
    <div id="error" class="ml-4 alert alert-danger">
      <?php echo getError(); ?>
    </div>
  <?php endif; ?>
  <?php if (hasSuccess()) : ?>
    <div id="success" class="ml-4 alert alert-success">
      <?php echo getSuccess(); ?>
    </div>
  <?php endif; ?>

  <div class="starts-card d-flex flex-wrap mx-4 gap-4 justify-content-center my-5">
    <!-- stats-card starts -->

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Users</p>
        <p class="card-text h1 font-weight-bold text-left">
          <?php $result = query('SELECT COUNT(id) AS total FROM `user`');
          // echo "<pre>";
          // print_r($result);
          echo $result[0]['total'];
          ?>
        </p>
      </div>
    </div>


    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Movies</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php $result = query('SELECT COUNT(id) AS total FROM `movie`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Movie Theaters</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php $result = query('SELECT COUNT(id) AS total FROM `hall`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Genres</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php $result = query('SELECT COUNT(id) AS total FROM `genre`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 outline-black3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Shows</p>
        <p class="card-text h1 font-weight-bold text-left"><?php $result = query('SELECT COUNT(id) AS total FROM `shows`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Bookings</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php $result = query('SELECT COUNT(id) AS total FROM `booking`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Total Payments</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php $result = query('SELECT COUNT(id) AS total FROM `payment`');
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $result[0]['total'];
                                                            ?></p>
      </div>
    </div>

    <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft" style="cursor: pointer;">
      <div class="card-body">
        <p class="card-title text-left text-muted font-weight-bold " style="font-size: 1.2rem;">Approved Bookings</p>
        <p class="card-text h1 font-weight-bold text-left"> <?php
                                                            $result = where('booking', 'status', '=', 'booked');
                                                            $approved = count($result);
                                                            // echo "<pre>";
                                                            // print_r($result);
                                                            echo $approved;
                                                            ?></p>
      </div>
    </div>

    <!-- stats-card ends -->
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once __DIR__ . "/./components/footer.php"; ?>