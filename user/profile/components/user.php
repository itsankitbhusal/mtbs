<?php
include  __DIR__ . "/../../../functions/db.php";
include  __DIR__ . "/../../../functions/functions.php";
include  __DIR__ . "/../../../functions/validation.php";

$result = check_user();
$page_url = "http://localhost/mtbs/public/";

$shows = all('shows');
$booking = where('booking', 'status', '=', 'pending');

// echo "<pre>";
// print_r($shows);

if ($shows) {
    date_default_timezone_set('Asia/Kathmandu');

    foreach ($shows as $s) {
        $date = $s['play_date'];
        $currentDate = date("Y-m-d");
        // echo "$date <br>";
        // echo "$currentDate <br>";
        if ($date < $currentDate) {
            delete('shows', $s['id']);
            // echo "deleted";
        } elseif ($date == $currentDate) {
            // echo "inside next loop <br><br>";

            $time = $s['play_time'];

            if (!empty($time)) {
                // convert databse time to timestamp to compare
                $time_timestamp = DateTime::createFromFormat('H:i:s', $time)->getTimestamp();
                // echo $time_timestamp . "<br><br>";
                $current_timestamp  = time();
                if ($current_timestamp > $time_timestamp) {
                    delete('shows', $s['id']);
                }
            }
        }
    }

    //delete booking after 15 minutes
    foreach ($booking as $b) {
        $t = $b['booking_time'];
        $now_time = explode(' ', $t);
        $db_date = $now_time[0];
        $db_time = strtotime($now_time[1]);


        $cur = strtotime(date('H:i:s'));
        $cur_date = date('Y-m-d');


        if ($db_date < $cur_date) {
            delete('booking', $b['id']);
            setError('Booking Timeout!!');
        }

        if (($db_time + 900) < $cur) {
            delete('booking', $b['id']);
            setError('Booking Timeout!!');
        }
    }
}
