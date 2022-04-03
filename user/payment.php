<?php
require "./components/user.php";

$booking_id = request('id');
if (empty($booking_id)) {
    setError('Please provide valid booking id!!');
    header('Location: ./index.php');
    die;
}
$is_booked = find('booking', $booking_id);
if (!$is_booked) {
    setError('Please provide valid id!!');
    header('Location: ./index.php');
    die;
}
$is_paid = where('payment', 'booking_id', '=', $booking_id, false);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mdb.min.css">
    <title>Payment Page</title>
    <style>
        html {
            scrollbar-width: thin;

        }

        html::-webkit-scrollbar {
            width: .5vw;
        }

        html::-webkit-scrollbar-thumb {
            background-color: gray;
        }

        html::-webkit-scrollbar-track {
            background-color: white;
        }
    </style>

</head>

<body>

    <div class="container">
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
        <?php if (!$is_paid) : ?>
            <form action="./payment.inc.php?id=<?php echo $booking_id; ?>" method="post" class="col-md-4 mx-auto mt-5">
                <div class="form-group">
                    <label for="name_on_card">Name on card</label>
                    <input type="text" name="name_on_card" class="form-control" id="name_on_card">
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="number" name="card_number" class="form-control" id="card_number">
                </div>
                <div class="form-group">
                    <label for="exp_date">Expiration Day</label>
                    <input type="date" name="exp_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="exp_date">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="number " name="cvv" class="form-control" id="cvv">
                </div>
                <button type="submit" class="btn btn-success my-3 ">Make Payment</button>
            </form>
        <?php endif; ?>

        <?php if ($is_paid) : ?>

            <div class="container">
                <p class="h1">Payment Already Done!!</p>
            </div>

        <?php endif; ?>

    </div>

</body>
<script src="./js/script.js"></script>

</html>