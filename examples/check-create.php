
<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;

    $token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $environment = "LOCAL" ; // SANDBOX , LIVE
    $ocw         = new OnlineCheckWriter($token,$environment);

     $payeeResponse   = $ocw->payees()->create(array(
        'name'       =>'Alison Gambala',
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

    $bankAccountResponse = $ocw->bankAccounts()->create(array(   
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

       
    $categoryResponse =$ocw->categories()->create(array(
        "name" =>"Category 1",
        "type" =>"income"
    ));

     //Example -1 Create single check
     $checkResponse  =   $ocw->checks()->create(array(
                "bankAccountId" => $bankAccountResponse['data']['bankAccounts'][0]['bankAccountId'],
                "payeeId"       => $payeeResponse['data']['payees'][0]['payeeId'],
                "categoryId"    => $categoryResponse['data']['categoryId'],
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
    print_r($checkResponse);

    
    //Example -2 Create check with voucher
    $checkWithVoucher  =   $ocw->checks()->create(
        array(
            "bankAccountId" =>$bankAccountResponse['data']['bankAccounts'][0]['bankAccountId'],
            "payeeId"       =>$payeeResponse['data']['payees'][0]['payeeId'],
            "categoryId"    =>null,
            "serialNumber"  =>"1002",
            "issueDate"     =>"2020-10-25",
            "amount"        =>200,
            "memo"          =>"First, Test check using API...",
            "note"          =>"",
            "accountNumber" =>"458757",
            "invoiceNumber" =>"2546",
            "noSign"        =>0,
            "noAmount"      =>0,
            "noDate"        =>0,
            "noPayee"       =>0,
            "voucher"       =>[
                                    "voucherNumber"     =>"1000",
                                    "memo"              =>"Test Memo",
                                    "date"              =>"2020-10-20",
                                    "voucherItems"      =>[
                                                            [
                                                                "invoiceNumber"    =>858,
                                                                "name"             =>"Product 1",
                                                                "description"      =>"Product Description 1",
                                                                "quantity"         =>10,
                                                                "unitCost"         =>5,
                                                                "total"           =>200
                                                            ],
                                                            [
                                                                "invoiceNumber"    =>540,
                                                                "name"             =>"Product 1",
                                                                "description"      =>"Product Description 1",
                                                                "quantity"         =>null,
                                                                "unitCost"         =>null,
                                                                "total"           =>350
                                                            ]
                                                        ]
                                ]
        ));

        print_r($checkWithVoucher);


        //Example - 3 Create Multiple check
        $multipleCheckResponse = $ocw->checks()->create(
            array(
          
                     [
                             "bankAccountId" =>$bankAccountResponse['data']['bankAccounts'][0]['bankAccountId'],
                             "payeeId"       =>$payeeResponse['data']['payees'][0]['payeeId'],
                             "categoryId"    =>null,
                             "serialNumber"  =>"1001",
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
                             "voucherId"     =>null
                         ],
                         [
                             "bankAccountId" =>$bankAccountResponse['data']['bankAccounts'][0]['bankAccountId'],
                             "payeeId"       =>$payeeResponse['data']['payees'][0]['payeeId'],
                             "categoryId"    =>null,
                             "serialNumber"  =>"1002",
                             "issueDate"     =>"2020-10-25",
                             "amount"        =>200,
                             "memo"          =>"First, Test check using API...",
                             "note"          =>"",
                             "accountNumber" =>"458757",
                             "invoiceNumber" =>"2546",
                             "noSign"        =>0,
                             "noAmount"      =>0,
                             "noDate"        =>0,
                             "noPayee"       =>0
                         ]
     
             ));
     
             print_r($multipleCheckResponse);

?>

 
  
