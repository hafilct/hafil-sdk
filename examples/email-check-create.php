<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);


      //create email check
      $res = $ocw->emailChecks()->create(array(
            "checkId"         =>"",
            "payeeEmail"      =>"test1000@test.com",
            "enableSmsInform" =>true,
            "payeePhone"      =>"123456789"
      ));              
      print_r($res);

      //create multiple email check
      $response = $ocw->emailChecks()->create(array(
            [
                "checkId"         =>"",
                "payeeEmail"      =>"test1000@test.com",
                "enableSmsInform" =>true,
                "payeePhone"      =>"123456789"
            ],
            [
                "checkId"         =>"",
                "payeeEmail"      =>"test1001@test.com",
                "enableSmsInform" =>true,
                "payeePhone"      =>"123456789"
            ]
      ));
      print_r($response);

        



              