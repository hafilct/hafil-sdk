<?php

require_once __DIR__ . '../../vendor/autoload.php';


use OnlineCheckWriter\OnlineCheckWriter;

    $token        ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

    //Example 1 - Create single bank account
    $res = $ocw->bankAccounts()->create(array(        
            "name"                    =>"Demo Bank Account",
            "nickName"                =>"Demo Nick Name",
            "accountNumber"           =>"123456789",
            "addressLine1"            =>"Test Address Line 1",
            "addressLine2"            =>"Test Address Line 2",
            "phone"                   =>"9002444001",
            "city"                    =>"Sanjose1",
            "state"                   =>"CA",
            "zip"                     =>"95113",
            "bankName"                =>"Demo Bank",
            "bankRoutingNumber"       =>"154258752",
            "bankAddress1"            =>"Address 1",
            "bankCity"                =>"Dallas",
            "bankState"               =>"CA",
            "bankZip"                 =>"75001",
            "bankIdentity"            =>"58756985" 
    ));
    print_r($res);

    //Example 2 - Create multiple bank account
    $response = $ocw->bankAccounts()->create(array(
        [
            "name"                    =>"Demo Bank Account",
            "nickName"                =>"Demo Nick Name",
            "accountNumber"           =>"123456789",
            "addressLine1"            =>"Test Address Line 1",
            "addressLine2"            =>"Test Address Line 2",
            "phone"                   =>"9002444001",
            "city"                    =>"Sanjose1",
            "state"                   =>"CA",
            "zip"                     =>"95113",
            "bankName"                =>"Demo Bank",
            "bankRoutingNumber"       =>"154258752",
            "bankAddress1"            =>"Address 1",
            "bankCity"                =>"Dallas",
            "bankState"               =>"CA",
            "bankZip"                 =>"75001",
            "bankIdentity"            =>"58756985"
        ],
        [
            "name"                    =>"Demo Bank Account",
            "nickName"                =>"Demo Nick Name",
            "accountNumber"           =>"123456789",
            "addressLine1"            =>"Test Address Line 1",
            "addressLine2"            =>"Test Address Line 2",
            "phone"                   =>"9002444001",
            "city"                    =>"Sanjose1",
            "state"                   =>"CA",
            "zip"                     =>"95113",
            "bankName"                =>"Demo Bank",
            "bankRoutingNumber"       =>"154258752",
            "bankAddress1"            =>"Address 1",
            "bankCity"                =>"Dallas",
            "bankState"               =>"CA",
            "bankZip"                 =>"75001",
            "bankIdentity"            =>"58756985"
        ]
    ));
    print_r($response);
       
