<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;

class CustomToAddress extends ResourceBase
{

    public function create(array $data)
    { 
        return  $this->sendRequest("POST",'/customToAddresses',$data);
    }

    public function all(array $query = array())
    { 
        return  $this->sendRequest("GET",'/customToAddresses');
    }

    public function get($id)
    {
        return  $this->sendRequest("GET","/customToAddresses/$id");
    }

    public function delete($id)
    {
        return  $this->sendRequest("DELETE","/customToAddresses/$id");
    }
   

}
