<?php
namespace CSI\Kampil\Model;

class Issuer extends BaseModel
{

    /**
     * Issuer Id, 32 huruf
     *
     * @var string
     */
    public $id;

    /**
     * Issuer Code maksimal 5 angka
     *
     * @var string
     */
    public $code;

    /**
     * Nama yang ditampilkan untuk issuer (seperti username pada login)
     *
     * @var string
     */
    public $secret;

    /**
     *
     * @var string
     */
    public $api_key;

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
    public $address = null;

    /**
     *
     * @var string
     */
    public $contact_name = null;

    /**
     *
     * @var string
     */
    public $contact_email = null;

    /**
     *
     * @var string
     */
    public $contact_phone = null;

    /**
     *
     * @var integer
     */
    public $topup_admin_fee = 0;

    /**
     *
     * @var integer
     */
    public $transfer_admin_fee = 0;

    /**
     *
     * @var integer
     */
    public $balance = 0;
}

