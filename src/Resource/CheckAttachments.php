<?php

namespace OnlineCheckWriter\Resource;

use OnlineCheckWriter\ResourceBase;
use OnlineCheckWriter\OnlineCheckWriter;

class CheckAttachments extends ResourceBase
{

    public function create(array $data,$checkId) { 
       
        return  $this->sendRequest("POST","/checks/$checkId/attachments",$data);
    }
    public function all($checkId){
        return  $this->sendRequest("GET","/checks/$checkId/attachments",[]);
    }

    public function delete($checkId,$attachmentId){
        return  $this->sendRequest("DELETE","/checks/$checkId/attachments/$attachmentId",[]);
    }
   

}
