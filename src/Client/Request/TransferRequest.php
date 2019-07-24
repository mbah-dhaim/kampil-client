<?php
namespace CSI\Kampil\Client\Request;

class TransferRequest extends BaseRequest
{

    /**
     *
     * @var string
     */
    public $action = "transfer";

    /**
     *
     * @var string
     */
    public $fromAccount;

    /**
     *
     * @var string
     */
    public $toAccount;

    /**
     *
     * @var integer
     */
    public $amount = 0;
}

