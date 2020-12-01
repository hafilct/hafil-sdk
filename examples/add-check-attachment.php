
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    $checkId ="6VoW41y71K4589l"; 

    //Example 1-Add attachment from local file to exisiting check
    $attachment=[
        "attachment"=>"@PATH\Test.pdf",
    ];

    $response=$ocw->checkAttachments()->create($attachment,$checkId);
    print_r($response);


    //Example 2 -Add attachment from remote url to exisiting check
     $attachment=[
        "fileUrl"=>"@PATH\Test.pdf",
    ];

    $response=$ocw->checkAttachments()->create($attachment,$checkId);
    print_r($response);
    