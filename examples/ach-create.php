
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    $checksList  = $ocw->checks()->all();
     //Send ACH 
    $response=$ocw->ach()->create(array(
        "checkIds" => array( $checksList['data']['checks'][0]['checkId'] , $checksList['data']['checks'][1]['checkId']) 
    ));                              
    print_r($response);

