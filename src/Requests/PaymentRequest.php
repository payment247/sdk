<?php

namespace Payment247\SDK\Requests;

class PaymentRequest extends Request implements IFlow
{
    use FlowTrait, TransactionTrait;

    protected $fields = [
        'amount',
        'currency',
        'order_id',
        'user',
        'product',
        'ps',
        'flow',
        'flow_parameters',
        'success_url',
        'pending_url',
        'fail_url',
        'email',
        'custom',
    ];

    /**
     * @return string
     */
    public function getRequestType()
    {
        return 'payment';
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->raw['product'];
    }

    /**
     * @param string $product
     */
    public function setProduct($product)
    {
        $this->raw['product'] = $product;
    }
}
