<?php
require "./components/user.php";

check_user();
//getting user id from session
// $user_id = $_SESSION['user_id']; //user id
$id = request('id'); //show id

//get hall data having id of hall
$hall = find('shows', $id);

$hall_id =  $hall['hall_id'];

//get total seats (Array )
$total_seats = query('select `total_seats` from `hall` where id =' . $hall_id, false);

//total no of seats
$seats = $total_seats['total_seats'];

//find price of a specific movie (Array)
$ticket_price = query('select `ticket_price` from `shows` where id =' . $id, false);

//actual price
$price = $ticket_price['ticket_price'];

//selected seats
//after payment

// user_id -> user_id --> from session --> done
// show_id -> show_id --> from shows table -> done
// total_tickets -> -------  --> seats --> done
// unit_price -> ------- -->  price --> done
// status -> pending/booked; --> by default (pending)
// booked_seats -->  from input filed --> from input field (booked_seats)
// total price --> unit price * booked_seats --> done
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mdb.min.css">
    <title>Book Seats</title>

    <style>
        input:out-of-range {
            background-color: rgba(255, 0, 0, 0.25);
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
        <div class="d-flex justify-content-center mt-5">
            <form action="./booking.php?sid=<?php echo $id ?>&hid=<?php echo $hall_id ?>&price=<?php echo $price; ?>&tt=<?php echo $total_seats['total_seats'];                                                                                                                        ?>" method="post" class="col-md-4">
                <div class="form-group">
                    <label for="unit_price">Unit Price</label>
                    <input name="unit_price" value="<?php foreach ($ticket_price as $t) {
                                                        echo $t;
                                                    } ?>" type="text" class="form-control" id="unit_price" disabled>
                </div>
                <div class="form-group">
                    <label for="booked_seats">Book Seats</label>
                    <input type="number" onchange="price()" name="booked_seats" min="1" max="5" class="form-control" id="booked_seats">
                </div>
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="number" name="total_price" min="1" max="5" class="form-control" id="total_price" disabled>
                </div>
                <button type="submit" class="form-control btn btn-primary my-4">Proceed to Payment</button>
            </form>
        </div>

    </div>

</body>

<script>
    function price() {
        const unitPrice = Number(document.getElementById('unit_price').value);
        var bookedSeats = Number(document.getElementById('booked_seats').value);
        // console.log(unitPrice);
        // console.log(bookedSeats);
        var total = unitPrice * bookedSeats;
        // console.log(total);
        document.getElementById('total_price').value = total;
    }
</script>
<script src="./js/script.js"></script>

</html>