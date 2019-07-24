<?php
namespace CSI\Kampil\Client\Request;

class TopupRequest extends BaseRequest
{

    /**
     *
     * @var string
     */
    public $action = "topup";

    /**
     *
     * @var string
     */
    public $vaNo;

    /**
     *
     * @var integer
     */
    public $amount = 0;
}

