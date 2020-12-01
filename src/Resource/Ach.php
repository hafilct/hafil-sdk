<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class Ach extends ResourceBase
{

    public function create(array $data) { 
       
        return  $this->sendRequest("POST","/ach/sent",$data);
    }

    // public function get($checkid)
    // {
    //     return  $this->sendRequest("GET","/ach/$checkid/status",[]);
    // }
    
    // public function all($checkid)
    // {
    //     return $this->sendRequest("GET","/ach/$checkid/statusAll",[]);
    // }
   

}
