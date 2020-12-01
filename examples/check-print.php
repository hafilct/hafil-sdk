
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    $checksList  = $ocw->checks()->all();

    //Example -1  //Print checks from check records
    $response = $ocw->checks()->print(array(
        "paperType" =>1,
        "checkId"=>[$checksList['data']['checks'][0]['checkId'] , $checksList['data']['checks'][1]['checkId']] 
    ));
    print_r($response);