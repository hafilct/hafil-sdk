<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;

class CustomFromAddress extends ResourceBase
{

    public function create(array $data)
    { 
         return  $this->sendRequest("POST",'/customFromAddresses',$data);
    }

    public function all(array $query = array())
    { 
         return  $this->sendRequest("GET",'/customFromAddresses');
    }

    public function get($id)
    {
         return  $this->sendRequest("GET","/customFromAddresses/$id");
    }

    public function delete($id)
    {
         return  $this->sendRequest("DELETE","/customFromAddresses/$id");
    }
   

}
