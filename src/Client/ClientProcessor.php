<?php
namespace CSI\Kampil\Client;

use CSI\Kampil\JWT;

class ClientProcessor
{

    /**
     *
     * @var \CSI\Kampil\Client\Setting
     */
    protected $setting;

    /**
     *
     * @var \CSI\Kampil\Client\Communicator
     */
    protected $comunicator;

    public function __construct()
    {
        $this->setting = Setting::of();
        $this->comunicator = Communicator::of();
    }

    /**
     *
     * @return static
     */
    public static function of()
    {
        static $instance = null;
        if (empty($instance))
            $instance = new static();
        return $instance;
    }

    /**
     *
     * @param string $payload
     * @return string
     */
    public function send($payload)
    {
        return $this->comunicator->send($this->setting, $payload);
    }

    /**
     *
     * @param string $jti
     *            tracking number
     * @param string $subject
     * @return $this
     */
    public function initRequest($jti, $subject = null)
    {
        JWT::of()->getBuilder()
            ->issuedBy($this->setting->getIssuerCode())
            ->issuedAt(time())
            ->permittedFor("KAMPIL")
            ->identifiedBy($jti);
        if ($subject)
            JWT::of()->getBuilder()->withClaim("sub", $subject);
        return $this;
    }

    /**
     *
     * @param \CSI\Kampil\Client\Request\BaseRequest $data
     * @return $this
     */
    public function withData(\CSI\Kampil\Client\Request\BaseRequest $data)
    {
        JWT::of()->getBuilder()->withClaim("data", $data);
        return $this;
    }

    /**
     *
     * @return string
     */
    protected function buildPayload()
    {
        return JWT::of()->getToken($this->getSetting()
            ->getIssuerApiKey());
    }

    public function parsePayload($payload)
    {
        $token = JWT::of()->parse($payload);
        $result = new \stdClass();
        $result->headers = $token->getHeaders();
        $result->claims = $token->getClaims();
        $result->isVerified = JWT::of()->verify($token, $this->getSetting()
            ->getIssuerApiKey());
        return $result;
    }

    /**
     *
     * @return \CSI\Kampil\Client\Setting
     */
    public function getSetting()
    {
        return $this->setting;
    }

    /**
     *
     * @return \CSI\Kampil\Client\Communicator
     */
    public function getComunicator()
    {
        return $this->comunicator;
    }
}

