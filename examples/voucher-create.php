<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;


$token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
$environment = "LOCAL" ; // SANDBOX , LIVE
$ocw         = new OnlineCheckWriter($token,$environment);
    
    $voucher = [            
                "voucherNumber"     =>"12345",
                "memo"              =>"Test Memo",
                "date"              =>"2020-10-20",
                "payeeId"           =>null,
                "voucherItems"      =>array(
                                                [
                                                    "invoiceNumber" => "541",
                                                    "name"          => "Product 2",
                                                    "description"   => "Product Description 2",
                                                    "quantity"      => "4.00",
                                                    "unitCost"      => "0.00",
                                                    "total"         => "200.00"
                                                ],
                                                [
                                                    "invoiceNumber" => "545",
                                                    "name"          => "Product 2",
                                                    "description"   => "Product Description 2",
                                                    "quantity"      => "5.00",
                                                    "unitCost"      => "0.00",
                                                    "total"         => "300.00"
                                                ],
                                                [
                                                    "invoiceNumber" => "540",
                                                    "name"          => "Product 1",
                                                    "description"   => "Product Description 1",
                                                    "quantity"      => "0.00",
                                                    "unitCost"      => "0.00",
                                                    "total"         => "200.00"
                                                ]
                                        )                   
                
                ];    

    $response=$ocw->vouchers()->create($voucher);
    print_r($response);

