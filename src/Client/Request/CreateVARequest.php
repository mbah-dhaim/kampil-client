<?php
namespace CSI\Kampil\Client\Request;

class CreateVARequest extends BaseRequest
{

    public $action = "createVA";

    public $vaNo;

    public $custName;

    public $custEmail = null;

    public $custPhone = null;

    public $custDescr = null;

    public $custBalance = 0;
}

