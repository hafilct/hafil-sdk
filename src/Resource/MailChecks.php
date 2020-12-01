<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class MailChecks extends ResourceBase
{

    public function create(array $data)
    { 
        return  $this->sendRequest("POST",'/mailchecks',$data);
    }

    public function getMailOptions(){
        return  $this->sendRequest("GET",'/mailchecks/mailingOptions');
    }

    
}
