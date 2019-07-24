<?php
namespace CSI\Kampil;

use CSI\Kampil\Response\BaseResponse;

class JWT
{

    /**
     *
     * @var \Lcobucci\JWT\Builder
     */
    private $builder = null;

    /**
     *
     * @var \Lcobucci\JWT\Signer
     */
    private $signer = null;

    /**
     *
     * @var \Lcobucci\JWT\Parser
     */
    private $parser = null;

    /**
     *
     * @var \Lcobucci\JWT\Token
     */
    private $jwtToken = null;

    private function __construct()
    {
        $this->signer = new \Lcobucci\JWT\Signer\Hmac\Sha512();
    }

    /**
     *
     * @return \CSI\Kampil\JWT
     */
    public static function of()
    {
        static $instance = null;
        $instance = $instance ?: new JWT();
        return $instance;
    }

    /**
     *
     * @param string $key
     * @return string
     */
    public function getToken($key)
    {
        $theKey = new \Lcobucci\JWT\Signer\Key($key);
        return $this->getBuilder()
            ->getToken($this->signer, $theKey)
            ->__toString();
    }

    /**
     *
     * @param string $jwt
     * @return \Lcobucci\JWT\Token
     */
    public function parse($jwt)
    {
        $this->jwtToken = $this->getParser()->parse($jwt);
        return $this->jwtToken;
    }

    public function verify(\Lcobucci\JWT\Token $token, $key)
    {
        return $token->verify($this->signer, $key);
    }

    public function badSignature(\CSI\Kampil\Model\Issuer $issuer)
    {
        $data = new BaseResponse();
        $data->errorCode = KampilErrors::ERROR_BAD_SIGNATURE;
        $data->errorMessage = "Bad Signature";
        $this->getBuilder()
            ->withClaim("iss", "KAMPIL")
            ->withClaim("aud", $issuer->code)
            ->withClaim("iat", time())
            ->withClaim("sub", "Bad Signature")
            ->withClaim("data", $data);
        return $this->getToken($issuer->api_key);
    }

    /**
     *
     * @return \Lcobucci\JWT\Builder
     */
    public function getBuilder()
    {
        $this->builder = empty($this->builder) ? new \Lcobucci\JWT\Builder() : $this->builder;
        return $this->builder;
    }

    /**
     *
     * @return \Lcobucci\JWT\Signer
     */
    public function getSigner()
    {
        return $this->signer;
    }

    /**
     *
     * @param \Lcobucci\JWT\Signer $signer
     * @return $this
     */
    public function setSigner($signer)
    {
        $this->signer = $signer;
        return $this;
    }

    /**
     *
     * @return \Lcobucci\JWT\Parser
     */
    public function getParser()
    {
        $this->parser = empty($this->parser) ? new \Lcobucci\JWT\Parser() : $this->parser;
        return $this->parser;
    }

    /**
     *
     * @return \Lcobucci\JWT\Token
     */
    public function getJwtToken()
    {
        return $this->jwtToken;
    }
}

