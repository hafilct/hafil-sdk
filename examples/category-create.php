
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;


$token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
$environment = "LOCAL" ; // SANDBOX , LIVE
$ocw         = new OnlineCheckWriter($token,$environment);

    //Example 1 -Create a new category
    $response=$ocw->categories()->create(array(
        "name" =>"Category",
        "type" =>"income"
    ));
    print_r($response);
 