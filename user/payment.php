<?php
require "../functions/db.php";
require "../functions/functions.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mdb.min.css">

    <title>Payment Page </title>

</head>

<body>

    <div class="container">
        <form action="./payment.inc.php" method="post" class="col-md-4 mx-auto mt-5">
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
    </div>

</body>

</html>