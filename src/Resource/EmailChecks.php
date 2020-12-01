<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class EmailChecks extends ResourceBase
{

    public function create(array $data)
    { 
        return  $this->sendRequest("POST",'/emailChecks',$data);
    }
 
}
