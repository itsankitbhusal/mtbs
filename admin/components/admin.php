<?php
include  __DIR__ . "/../../functions/db.php";
include  __DIR__ . "/../../functions/functions.php";

$result = check_admin();
$page_url = "http://localhost/mtbs/admin/";

$shows = all('shows');
echo "<pre>";
print_r($shows);

foreach ($shows as $s) {
    $date = $s['play_date'];
    $currentDate = date("Y-m-d");

    if ($date < $currentDate) {

        delete('shows', $s['id']);
    }
}
foreach ($shows as $s) {
    $time = $s['play_time'];
    if (!empty($time)) {
        $current_timestamp  = time();
        $current_time = date('H:i:s', $current_timestamp);
        if ($time < $current_time) {
            delete('shows', $s['id']);
        }
    }
}
