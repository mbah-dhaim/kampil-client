<?php
namespace CSI\Kampil\Model;

class Topup extends BaseModel
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
    public $va_no;

    /**
     *
     * @var string
     */
    public $issuer_id;

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
    public $prev_balance = 0;

    /**
     *
     * @var integer
     */
    public $curr_balance = 0;

    /**
     *
     * @var string
     */
    public $invoice_no = null;

    /**
     *
     * @var string
     */
    public $created_at = null;
}

