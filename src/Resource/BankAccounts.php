<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;

class BankAccounts extends ResourceBase
{

    public function create(array $data)
    { 
        $bankAccounts = $this->convertRequestFormat('bankAccounts',$data);
        return  $this->sendRequest("POST",'/bankAccounts',$bankAccounts);
    }

    public function all(array $query = array())
    { 
        return  $this->sendRequest("GET",'/bankAccounts');
    }

    public function get($id)
    {
        return  $this->sendRequest("GET","/bankAccounts/$id");
    }

    public function delete($id){
        return  $this->sendRequest("DELETE","/bankAccounts/$id");
    }
   

}
