
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    //Example 1-Add local file
    $attachment=[
        "attachment"=>"@PATH\Test.pdf",
    ];

    $response=$ocw->checkAttachments()->create($attachment,$checkid);
    print_r($response);


    //Example 2 -Add remote url
     $attachment=[
        "fileUrl"=>"@PATH\Test.pdf",
    ];

    $response=$ocw->checkAttachments()->create($attachment,$checkid);
    print_r($response);
    