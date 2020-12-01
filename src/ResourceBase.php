<?php

namespace OnlineCheckWriter;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ConnectException;
use OnlineCheckWriter\Exception\AuthorizationException;
use OnlineCheckWriter\Exception\ForbiddenException;
use OnlineCheckWriter\Exception\NetworkErrorException;
use OnlineCheckWriter\Exception\RateLimitException;
use OnlineCheckWriter\Exception\ResourceNotFoundException;
use OnlineCheckWriter\Exception\UnexpectedErrorException;
use OnlineCheckWriter\Exception\ValidationException;

abstract class ResourceBase{

    protected   $ocw;
    protected   $client;

    public function __construct(OnlineCheckWriter $ocw)
    {
          $this->ocw = $ocw;
          $this->client = new Client();
    }

    public function sendRequest($request_method = "POST",$path, $body=[],$query=[],$headers=[]){
        
        try{
           $fullUrl          = $this->getResourceFullUrl($path, $query);
           $body_with_header = $this->getFormattedBody($body, $headers); 
           $response         = $this->client->request($request_method, $fullUrl, $body_with_header);
        }
        catch(ConnectException $e){
            throw new NetworkErrorException($e->getMessage());
        }
        catch (GuzzleException $e){
            if (!$e->hasResponse()){
                throw new UnexpectedErrorException('An Unexpected Error has occurred: ' . $e->getMessage());
            }

            $statusCode        = $e->getResponse()->getStatusCode();
            $responseErrorBody = strval($e->getResponse()->getBody());
            $errorMsg          = $this->getErrorMessage($responseErrorBody);

            if ($statusCode === 422){
                throw new ValidationException($errorMsg , 422);
            }
            if ($statusCode === 401){
                throw new AuthorizationException("Unauthenticated" , 401);
            }
            if ($statusCode === 403){
                throw new ForbiddenException($errorMsg , 403);
            }
            if ($statusCode === 404){
                throw new ResourceNotFoundException($errorMsg , 404);
            }
            if ($statusCode === 429){
                throw new RateLimitException("Too many attempts.." , 429);
            }else{
                throw new UnexpectedErrorException('An Unexpected Error has occurred: ' . $e->getMessage());
            }
        }
        catch (Exception $e){
            throw new UnexpectedErrorException('An Unexpected Error has occurred: ' . $e->getMessage());
        }
         $response = json_decode($response->getBody(), true);
         return  $response;
      
    }

    protected function getResourceFullUrl($path, array $query = [])
    {
        $path = $this->ocw->getBaseUrl() .$path;
        $queryString = '';
        if (!empty($query)) {
            $queryString = '?'.http_build_query($query);
        }
        return $path.$queryString;
    }

    protected function getFormattedBody(array $body = null, array $headers = null)
    {
        $options = array(
            'headers' => array(
                'Accept'         => 'application/json;charset=utf-8',
                'Authorization'  => "Bearer " .$this->ocw->getApiToken()
            ),
         );
         if($headers) {
            $options['headers'] = array_merge($options['headers'], $headers);
         }
         if(!$body){
            return $options;
         }

         //Convert booleans to string
         $body = $this->convertBooleanToString($body);

         //find Any local file exist
         $files = array_filter($body, function ($element) {
            return (is_string($element) && strpos($element, '@') === 0);
         });

        if(!$files) {
            $options['form_params'] = $body;
            return $options;
        }

         $body = $this->nestedToSingleArray($body);
         $options['multipart'] = array();
         foreach($body as $key => $value) {
            $element = array( 
                'name' => $key,
                'contents' => $value
            );

            if (in_array($key, ['attachment'])&&(is_string($value) && strpos($value, '@') === 0)) {
                $element['contents'] =  fopen(substr($value, 1), 'r');
            }
          $options['multipart'][] = $element;
        }
        return $options;       
    }

    protected function nestedToSingleArray(array $body, $prefix = '')
    {
        $newBody = array();
        foreach ($body as $k => $v) {
            $key = (!strlen($prefix)) ? $k : "{$prefix}[{$k}]";
            if (is_array($v)) {
                $newBody += $this->nestedToSingleArray($v, $key);
            } else {
                $newBody[$key] = $v;
            }
        }
        return $newBody;
    }

    protected function convertBooleanToString($body)
    {
        return array_map(function($v)
                {
                    if (is_bool($v))
                    {
                        return $v ? 'true' : 'false';
                    } 
                    else if (is_array($v)) {
                        return $this->convertBooleanToString($v);
                    }
                    return $v;
                }, $body);
    }

    protected function getErrorMessage($body)
    {
        $response = json_decode($body, true);
        if (is_array($response) && array_key_exists('errorMsg', $response)) {
            $error = $response['errorMsg'];
            return $error;
        }  
        return 'An Internal Error has occurred';
    }

    public function isMultiArray(Array $data)
    {
        if(array_key_exists(0,$data) ) {
            return true;
         }
         return false;
    }

    //This function convert multiple creation input data to V3 format.
    public function convertRequestFormat($key,Array $data){
        if($this->isMultiArray($data)){
            array_key_exists($key,$data)? $result= $data: $result[$key]= $data;
        }
        else{
            array_key_exists($key,$data)? $result= $data: $result[$key]= [$data];
        }
        return  $result;  
    }

}
