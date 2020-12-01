<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;

class Categories extends ResourceBase
{

    public function create(array $data)
    { 
        return  $this->sendRequest("POST",'/categories',$data);
    }

    public function all(array $query = array())
    { 
        return  $this->sendRequest("GET",'/categories');
    }

   
   

}
