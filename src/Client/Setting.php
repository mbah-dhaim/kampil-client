<?php
namespace CSI\Kampil\Client;

class Setting
{

    /**
     *
     * @var string
     */
    private $issuerSecret = null;

    /**
     *
     * @var string
     */
    private $issuerCode = null;

    /**
     *
     * @var string
     */
    private $issuerApiKey = null;

    /**
     *
     * @var string
     */
    private $apiUrl = null;

    /**
     * Constructor
     */
    private function __construct()
    {}

    /**
     *
     * @return \CSI\Kampil\Client\Setting
     */
    public static function of()
    {
        static $instance = null;
        if (empty($instance))
            $instance = new Setting();
        return $instance;
    }

    /**
     *
     * @return string
     */
    public function getIssuerSecret()
    {
        return $this->issuerSecret;
    }

    /**
     *
     * @param string $issuerSecret
     * @return $this
     */
    public function setIssuerSecret($issuerSecret)
    {
        $this->issuerSecret = $issuerSecret;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getIssuerCode()
    {
        return $this->issuerCode;
    }

    /**
     *
     * @param string $issuerCode
     * @return $this
     */
    public function setIssuerCode($issuerCode)
    {
        $this->issuerCode = $issuerCode;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getIssuerApiKey()
    {
        return $this->issuerApiKey;
    }

    /**
     *
     * @param string $issuerApiKey
     * @return $this
     */
    public function setIssuerApiKey($issuerApiKey)
    {
        $this->issuerApiKey = $issuerApiKey;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     *
     * @param string $apiUrl
     * @return $this
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }
}

