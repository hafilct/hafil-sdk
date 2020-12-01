<?php
require_once __DIR__ . '../../vendor/autoload.php';
use OnlineCheckWriter\OnlineCheckWriter;


$token       ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
$environment = "LOCAL" ; // SANDBOX , LIVE
$ocw         = new OnlineCheckWriter($token,$environment);
    
     //Create new payee
     $response = $ocw->payees()->create(array(
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
      print_r($response);


    //Create Multiple Payees
     $response= $ocw->payees()->create(array(
        [
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
        ],
        [      
        
            'name'       =>'Alison Gambala 2',
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
        ]

     ));
     print_r($response);
       

