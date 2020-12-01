<?php

namespace OnlineCheckWriter;

use InvalidArgumentException;
use OnlineCheckWriter\Resource\Ach;
use OnlineCheckWriter\Resource\BankAccounts;
use OnlineCheckWriter\Resource\Categories;
use OnlineCheckWriter\Resource\CheckAttachments;
use OnlineCheckWriter\Resource\Checks;
use OnlineCheckWriter\Resource\CustomFromAddress;
use OnlineCheckWriter\Resource\CustomToAddress;
use OnlineCheckWriter\Resource\EmailChecks;
use OnlineCheckWriter\Resource\MailChecks;
use OnlineCheckWriter\Resource\Payees;
use OnlineCheckWriter\Resource\Vouchers;

class OnlineCheckWriter{

    const SANDBOX_BASE_URL    = 'https://sandbox.onlinecheckwriter.com/api/v3';
    const LIVE_BASE_URL       = 'https://app.onlinecheckwriter.com/api/v3';
    const LOCAL_BASE_URL      = 'http://localhost:8000/api/v3';

    
    private $apiToken;
    private $baseUrl;
    private $version;
    private $enviorment;

    public function __construct($apiToken = null,$environment=null, $version = null)
    {
        if (!is_null($apiToken)) {
            $this->setApiToken($apiToken);
        }
        if (!is_null($environment)) {
            $this->setEnvironment($environment);
        }
        if (!is_null($version)) {
            $this->setVersion($version);
        }
       
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    public function getVersion()
    {
        return $this->version;
    }
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public  function setApiToken($apiToken)
    {
        if (!is_string($apiToken) || empty($apiToken)) {
            throw new InvalidArgumentException('API token must be a non-empty string.');
        }
        $this->apiToken = $apiToken;
    }
    public  function setVersion($version)
    {
        if (!is_string($version) || empty($version)) {
            $this->version ="v3";
        }
        $this->version = $version;
    }

    public function setEnvironment($environment){
        if($environment=="SANDBOX"){
            $this->baseUrl = self::SANDBOX_BASE_URL;
        }
        else if($environment=="LIVE"){
            $this->baseUrl = self::LIVE_BASE_URL;
        }
        else{
            // throw new InvalidArgumentException('Invalid Environment variable');
            $this->baseUrl = self::LOCAL_BASE_URL;
        }
        return $this;
    }

    public function checks(){
        return new Checks($this);
    }

    public function bankAccounts(){
        return new BankAccounts($this);
    }

    public function payees(){
        return new Payees($this);
    }

    public function mailChecks(){
        return new MailChecks($this);
    }

    public function emailChecks(){
        return new EmailChecks($this);
    }

    public function categories(){
        return new Categories($this);
    }

    public function customFromAddresses(){
        return new CustomFromAddress($this);
    }

    public function customToAddresses(){
        return new CustomToAddress($this);
    }

    public function vouchers(){
        return new Vouchers($this);
    }

    public function ach()
    {
        return new Ach($this);
    }

    public function checkAttachments()
    {
        return new CheckAttachments($this);
    }
}