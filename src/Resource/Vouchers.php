<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class Vouchers extends ResourceBase
{

    public function create(array $data)
    {  
        return  $this->sendRequest("POST",'/vouchers', $data);
    }    

    public function get($id)
    {
        return  $this->sendRequest("GET","/vouchers/$id");
    }

    public function delete($id)
    {
        return  $this->sendRequest("DELETE","/vouchers/$id");
    }
   
}
