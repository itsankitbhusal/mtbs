<?php

require_once __DIR__ . "/../components/admin.php";

$id = request('id');

$shows = find('shows', $id);

if (empty($shows)) {
    die("Please enter valid id!!");
}


// echo "<pre>";
// print_r($shows);
// die;
// Array
// (
//     [id] => 2
//     [hall_id] => 1
//     [movie_id] => 17
//     [play_date] => 2022-03-08
//     [play_time] => 10:35:00
//     [ticket_price] => 200
// )

if (empty($id)) {
    die("Please Enter a valid id!!");
}

if ($id != $shows['id']) {
    die("Please Enter a valid id!!");
}

// echo "<pre>";
// print_r($hall);
// die;

include  __DIR__ . "/../components/header.php";
include  __DIR__ . "/../components/sidebar.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex m-4 justify-content-between mb-4">
        <h3 class="font-weight-bold">Update shows</h3>
        <a href="./index.php" class="btn btn-primary px-4 font-weight-bold">Go back</a>
    </div>
    <?php if (hasError()) : ?>
        <div id="error" class="ml-4 alert alert-danger">
            <?php echo getError(); ?>
        </div>
    <?php endif; ?>


    <!-- /.container-fluid -->
    <form class="m-4" method="POST" action="update.php/?id=<?php echo $id; ?>">


        <div class="form-group">

            <label for="language">Hall</label>
            <select name="hall_id" class="form-control" id="language">
                <?php $hall = all('hall');
                foreach ($hall as $h) :
                ?>
                    <option <?php if ($shows['hall_id'] == $h['id']) {
                                echo 'selected';
                            }
                            ?> value="<?php echo $h['id']; ?>"><?php echo $h['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">

            <label for="language">Movie</label>
            <select name="movie_id" class="form-control" id="language">
                <?php $movie = all('movie');

                foreach ($movie as $m) :

                ?>
                    <option <?php

                            if ($m['id'] == $shows['movie_id']) {
                                echo "selected";
                            }
                            ?> value="<?php echo $m['id']; ?>"><?php echo $m['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="releseDate">Play Date</label>
            <input name="play_date" type="date" value="<?php echo $shows['play_date']; ?>" class="form-control" id="releseDate">
        </div>
        <div class="form-group">
            <label for="releseDate">Play Time</label>
            <input name="play_time" type="time" value="<?php echo $shows['play_time']; ?>" class="form-control" id="releseDate">
        </div>

        <div class="form-group">
            <label for="releseDate">Ticket Price</label>
            <input name="ticket_price" value="<?php echo $shows['ticket_price']; ?>" type="number" class="form-control" id="releseDate">
        </div>

        <button type="submit" class="btn btn-primary">Update Show</button>

    </form>
</div>
</div>
<!-- End of Main Content -->
<?php include __DIR__ . "/../components/footer.php"; ?>