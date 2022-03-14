<?php
require_once __DIR__ . "/./components/admin.php";
include_once __DIR__ . "/./components/header.php";
include_once __DIR__ . "/./components/sidebar.php";

?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>
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


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once __DIR__ . "/./components/footer.php"; ?>