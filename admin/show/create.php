<?php
require_once __DIR__ . "/../components/admin.php";
include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Add Show</h3>
        <a href="./index.php" class="btn btn-primary px-4 font-weight-bold">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div id="error" class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>

    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="./store.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="language">Hall</label>
            <select name="hall_id" class="form-control" id="language">
                <?php $hall = all('hall');
                foreach ($hall as $h) :
                ?>
                    <option value="<?php echo $h['id']; ?>"><?php echo $h['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="language">Movie</label>
            <select name="movie_id" class="form-control" id="language">
                <?php $movie = all('movie');
                foreach ($movie as $m) :
                ?>
                    <option value="<?php echo $m['id']; ?>"><?php echo $m['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="releseDate">Play Date</label>
            <input name="play_date" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="releseDate">
        </div>
        <div class="form-group">
            <label for="releseDate">Play Time</label>
            <input name="play_time" type="time" value="<?php date_default_timezone_set('Asia/Kathmandu');
                                                        echo date('h:i'); ?>" class="form-control" id="releseDate">
        </div>

        <div class="form-group">
            <label for="releseDate">Ticket Price</label>
            <input name="ticket_price" type="number" class="form-control" id="releseDate">
        </div>

        <button type="submit" class="btn btn-primary">Add movie</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>