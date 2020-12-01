<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);


    //Retrieve all mail options
    $mailOptions =  $ocw->mailChecks()->getMailOptions();

    //Create payee
    $payeeResponse   = $ocw->payees()->create(array(
        'name'       =>'Alison Gambal mail12',
        'nickName'   =>'jhon',
        'company'    =>'',
        'email'      =>'email@test.com',
        'phone'      =>'900244400',
        'address1'   =>'95113 mark street rod',
        'address2'   =>'',
        'city'       =>'Sanjose',
        'state'      =>'CA',
        'zip'        =>'95113',
        'country'    =>'US'
    ));     

    //Create bank account
    $bankAccountResponse = $ocw->bankAccounts()->create(array(   
        "name"                    =>"Demo Bank Account mail12",
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
   
  
     //create a check
     $checkResponse  =   $ocw->checks()->create(array(
        "bankAccountId" => $bankAccountResponse['data']['bankAccounts'][0]['bankAccountId'],
        "payeeId"       => $payeeResponse['data']['payees'][0]['payeeId'],
        "categoryId"    => null,
        "serialNumber"  => "1001",
        "issueDate"     =>"2020-10-25",
        "amount"        =>100,
        "memo"          =>"First, Test check using API",
        "note"          =>"",
        "accountNumber" =>"458756",
        "invoiceNumber" =>"2545",
        "noSign"        =>0,
        "noAmount"      =>0,
        "noDate"        =>0,
        "noPayee"       =>0,
        "voucherId"     =>null,
    ));
    

    $checkid   =  $checkResponse['data']['checks'][0]['checkId'];

    //Add local file attachment to check
    $attachment=[
        "attachment"=>"@PATH\Test.pdf",
    ];
    $attachmentResponse = $ocw->checkAttachments()->create($attachment,$checkid);
    $attachmentId       = $attachmentResponse['data']['checkAttachmentId'];


     //Example 1 - Send mail check to its own payee address
    $response = $ocw->mailChecks()->create(array(
        "isShippingToCustomAddress"   =>false,      
        "mailChecks"                  =>array(
                 [
                    "checkId"                     =>$checkid, 
                    "shippingTypeId"              =>$mailOptions['shippingTypes'][0]['shippingTypeId'], //First class
                    "paperTypeId"                 =>$mailOptions['paperTypes'][2]['paperTypeId'],      //Ultra Hollogram Check Paper
                    "informTypeId"                =>$mailOptions['informTypes'][0]['informTypeId'],    //Notify Receiver by Sms
                    "enableSmsInform"             =>false,
                    "enableEmailInform"           =>true,
                    "payeeEmail"                  =>"email@test.com",
                    "payeePhone"                  =>"123456789",
                    "attachmentIds"               =>[$attachmentId]
                 ],
                
                )
    ));

    print_r($response);

    //Example 2 -Send mail to custom payee address

    //Create custom from address
      $customFromAddressResponse=$ocw->customFromAddresses()->create(
        array(
           "name"              =>"Stella R Peltona asda212",
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
  
    //Create custom to address
     $customToAddressResponse=$ocw->customToAddresses()->create(
        array(
            "name"              =>"Stella R Peltona 221",
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
  
     $response = $ocw->mailChecks()->create(array(
        "isShippingToCustomAddress"   =>false,
        "customFromAddressId"         =>$customFromAddressResponse['data']['id'],
        "customToAddressId"           =>$customToAddressResponse['data']['id'],
        "customShippingTypeId"        =>5,
        "mailChecks"                  =>array(
                 [
                    "checkId"                     =>$checkid, 
                    "shippingTypeId"              =>$mailOptions['shippingTypes'][0]['shippingTypeId'], //First class
                    "paperTypeId"                 =>$mailOptions['paperTypes'][2]['paperTypeId'],      //Ultra Hollogram Check Paper,
                    "informTypeId"                =>$mailOptions['informTypes'][0]['informTypeId'],    //Notify Receiver by Sms,
                    "enableSmsInform"             =>0,
                    "enableEmailInform"           =>1,
                    "payeeEmail"                  =>"email@test.com",
                    "payeePhone"                  =>"123456789"
                 ],
                
                )
     ));
    print_r($response);
  


