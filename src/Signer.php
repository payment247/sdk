<?php

namespace Payment247\SDK;

class Signer
{
    protected $publicKey;
    protected $privateKey;

    public function __construct($publicKey, $privateKey)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function sign(array $data)
    {
        $data = array_merge($data, ['public_key' => $this->publicKey]);

        $signature = $this->getSignature($data);

        $data = array_merge($data, ['sign' => $signature]);

        return $data;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    protected function getSignature(array $data)
    {
        $baseString = json_encode($data).$this->privateKey;

        return hash('sha256', $baseString);
    }

    /**
     * @param array $data
     *
     * @return string
     *
     * @deprecated
     */
    protected function getSignatureOld(array $data)
    {
        $baseString = $this->concatenateParams($data).$this->privateKey;

        return hash('sha256', $baseString);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function checkSignature(array $data)
    {
        $signature = $data['sign'];
        unset($data['sign']);

        return $this->getSignature($data) === $signature ||
            $this->getSignatureOld($data) === $signature;
    }

    /**
     * @param array  $data
     * @param string $arrayKey
     *
     * @return string
     */
    protected function concatenateParams(array $data = [], $arrayKey = '')
    {
        ksort($data);

        $string = '';

        foreach ($data as $key => $value) {
            $generatedArrayKey = empty($arrayKey) ? $key : ($arrayKey.'['.$key.']');
            if (is_array($value)) {
                $string .= $this->concatenateParams($value, $generatedArrayKey);
            } else {
                $string .= $generatedArrayKey.'='.$value;
            }
        }

        return $string;
    }
}
