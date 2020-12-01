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
        $mailOptions = $this->sendRequest("GET",'/mailchecks/mailingOptions');
        return $mailOptions['data'];
    }

}
