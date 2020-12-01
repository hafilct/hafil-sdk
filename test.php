
<?php
require_once __DIR__ . '/vendor/autoload.php';

use OnlineCheckWriter\OnlineCheckWriter;


    $token   ="lgcu86ZhYb7PoEHJfm3A9JlCBYAQbp1UTS2VQVOcdoj7OXNMUxJsYnhssSnw";
    $ocw     = new OnlineCheckWriter($token,"LOCAL");
    // $checks  = $ocw->checks()->all();
    // print_r($checks);

     $options =  $ocw->mailChecks()->getMailOptions();
     print_r($options);
  
 

  
