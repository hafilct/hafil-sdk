
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    //Example-1 Create custom from address
    $response = $ocw->customFromAddresses()->create(
        array(
        "name"              =>"Stella R Peltona",
        "companyName"       =>"OCW",
        "addressLine1"      =>"2915  Frederick Street",
        "addressLine2"      =>"9466 Del Monte Ave.Lindenhurst, NY 11757",
        "city"              =>"SAINT PETERS",
        "state"             =>"MO",
        "zip"               =>"63376",
        "phone"             =>"900244400",
        "email"             =>"email@test.com",
        "note"              =>"Test Not" 
     ));
                                
    print_r($response);
