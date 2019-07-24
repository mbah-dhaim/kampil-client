<?php
namespace CSI\Kampil\Client;

class Communicator
{

    /**
     *
     * @var boolean
     */
    private $debug = FALSE;

    protected function __construct()
    {}

    /**
     *
     * @return \CSI\Kampil\Client\Communicator
     */
    public static function of()
    {
        static $instance = null;
        if (empty($instance))
            $instance = new Communicator();
        return $instance;
    }

    /**
     *
     * @param string $url
     * @param string $headers
     * @param string $payload
     * @throws \RuntimeException
     * @return string
     */
    private function post($url, $headers, $payload)
    {
        $ch = curl_init();
        if ($this->debug) {
            curl_setopt($ch, CURLOPT_VERBOSE, true);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        if ($headers && is_array($headers))
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($curl_errno) {
            if ($httpcode >= 400)
                throw new \RuntimeException("HTTP Code: {$httpcode}, ERROR NO: {$curl_errno} " . curl_strerror($curl_errno));
            throw new \RuntimeException("{$curl_errno}: " . curl_strerror($curl_errno));
        }
        return $result;
    }

    /**
     *
     * @param \CSI\Kampil\Client\Setting $setting
     * @param string $payload
     * @return string
     */
    public function send(\CSI\Kampil\Client\Setting $setting, $payload)
    {
        $headers = [
            "Content-Type: text/plain",
            "Content-Length: " . strlen($payload),
            "Client-Id: {$setting->getIssuerSecret()}"
        ];
        return $this->post($setting->getApiUrl(), $headers, $payload);
    }

    /**
     *
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     *
     * @param boolean $debug
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }
}

