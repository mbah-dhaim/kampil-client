<?php
namespace CSI\Kampil\Model;

class Transfer extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $issuer_id;

    /**
     *
     * @var string
     */
    public $from_va_no;

    /**
     *
     * @var string
     */
    public $to_va_no;

    /**
     *
     * @var integer
     */
    public $amount = 0;

    /**
     *
     * @var integer
     */
    public $admin_fee = 0;

    /**
     *
     * @var integer
     */
    public $from_prev_balance = 0;

    /**
     *
     * @var integer
     */
    public $from_curr_balance = 0;

    /**
     *
     * @var integer
     */
    public $to_prev_balance = 0;

    /**
     *
     * @var integer
     */
    public $to_curr_balance = 0;

    /**
     *
     * @var string
     */
    public $created_at = null;
}

