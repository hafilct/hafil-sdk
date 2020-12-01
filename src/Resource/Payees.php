<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class Payees extends ResourceBase
{

    public function create(array $data)
    { 
        $payees = $this->convertRequestFormat('payees',$data);
        return  $this->sendRequest("POST",'/payees',$payees);
    }

    public function all(array $query = array())
    { 
        return  $this->sendRequest("GET",'/payees');
    }

    public function get($id)
    {
        return  $this->sendRequest("GET","/payees/$id");
    }

    public function delete($id){
        return  $this->sendRequest("DELETE","/payees/$id");
    }

}
