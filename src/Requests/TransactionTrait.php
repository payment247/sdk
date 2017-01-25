<?php

namespace Payment247\SDK\Requests;

trait TransactionTrait
{
    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->raw['amount'];
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->raw['amount'] = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->raw['currency'];
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->raw['currency'] = $currency;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->raw['order_id'];
    }

    /**
     * @param string $orderId
     */
    public function setOrderId($orderId)
    {
        $this->raw['order_id'] = $orderId;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->raw['user'];
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->raw['user'] = $user;
    }

    /**
     * @return string[]
     */
    public function getPaymentSystems()
    {
        return $this->raw['ps'];
    }

    /**
     * @param string[] $paymentSystems
     */
    public function setPaymentSystems($paymentSystems = [])
    {
        if (!is_array($paymentSystems)) {
            $paymentSystems = func_get_args();
        }

        $this->raw['ps'] = $paymentSystems;
    }

    /**
     * @return array
     */
    public function getFlowParameters()
    {
        return $this->raw['flow_parameters'];
    }

    /**
     * @param array $flowParameters
     */
    public function setFlowParameters($flowParameters)
    {
        $this->raw['flow_parameters'] = $flowParameters;
    }

    /**
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->raw['success_url'];
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl)
    {
        $this->raw['success_url'] = $successUrl;
    }

    /**
     * @return string
     */
    public function getPendingUrl()
    {
        return $this->raw['pending_url'];
    }

    /**
     * @param string $pendingUrl
     */
    public function setPendingUrl($pendingUrl)
    {
        $this->raw['pending_url'] = $pendingUrl;
    }

    /**
     * @return string
     */
    public function getFailUrl()
    {
        return $this->raw['fail_url'];
    }

    /**
     * @param string $failUrl
     */
    public function setFailUrl($failUrl)
    {
        $this->raw['fail_url'] = $failUrl;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->raw['email'];
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->raw['email'] = $email;
    }

    /**
     * @return array
     */
    public function getCustom()
    {
        return $this->raw['custom'];
    }

    /**
     * @param array $custom
     */
    public function setCustom($custom)
    {
        $this->raw['custom'] = $custom;
    }
}
