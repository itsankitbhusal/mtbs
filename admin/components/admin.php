<?php
include  __DIR__ . "/../../functions/db.php";
include  __DIR__ . "/../../functions/functions.php";

$result = check_admin();
$page_url = "http://localhost/mtbs/admin/";

$shows = all('shows');
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
}
