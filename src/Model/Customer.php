<?php
namespace CSI\Kampil\Model;

class Customer extends BaseModel
{

    /**
     *
     * @var string
     */
    public $va_no;

    /**
     *
     * @var string
     */
    public $issuer_id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $email = null;

    /**
     *
     * @var string
     */
    public $phone = null;

    /**
     *
     * @var string
     */
    public $descr = null;

    /**
     *
     * @var integer
     */
    public $balance = 0;

    /**
     *
     * @var integer
     */
    public $is_active = 1;
}

