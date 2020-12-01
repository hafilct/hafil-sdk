<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class Checks extends ResourceBase
{

    public function create(array $data){ 
        $checks = $this->convertRequestFormat('checks',$data);
        return  $this->sendRequest("POST",'/checks',$checks);
    }

    public function all(array $query = array()){ 
        return  $this->sendRequest("GET",'/checks',[]);
    }

    public function get($id){
        return  $this->sendRequest("GET","/checks/$id",[]);
    }

    public function delete($id){
        return  $this->sendRequest("DELETE","/checks/$id",[]);
    }

    public function print(array $data) { 
        return  $this->sendRequest("POST","/checks/print",$data);
    }
   

}
