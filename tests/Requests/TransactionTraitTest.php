<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\TransactionTrait;

class TransactionTraitTest extends \PHPUnit_Framework_TestCase
{
    public function test_getAmount_setAmount()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setAmount(10);

        $this->assertEquals(10, $trait->getAmount());
    }

    public function test_getCurrency_setCurrency()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setCurrency('USD');

        $this->assertEquals('USD', $trait->getCurrency());
    }

    public function test_getOrderId_setOrderId()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setOrderId(10);

        $this->assertEquals(10, $trait->getOrderId());
    }

    public function test_getUser_setUser()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setUser(10);

        $this->assertEquals(10, $trait->getUser());
    }

    public function test_getPaymentSystems_setPaymentSystems()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setPaymentSystems('foo', 'bar');

        $this->assertEquals(['foo', 'bar'], $trait->getPaymentSystems());

        $trait->setPaymentSystems(['baz', 'bim']);

        $this->assertEquals(['baz', 'bim'], $trait->getPaymentSystems());
    }

    public function test_getFlowParameters_setFlowParameters()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setFlowParameters(['foo', 'bar']);

        $this->assertEquals(['foo', 'bar'], $trait->getFlowParameters());
    }

    public function test_getSuccessUrl_setSuccessUrl()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setSuccessUrl('http');

        $this->assertEquals('http', $trait->getSuccessUrl());
    }

    public function test_getPendingUrl_setPendingUrl()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setPendingUrl('http');

        $this->assertEquals('http', $trait->getPendingUrl());
    }

    public function test_getFailUrl_setFailUrl()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setFailUrl('http');

        $this->assertEquals('http', $trait->getFailUrl());
    }

    public function test_getEmail_setEmail()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setEmail('email');

        $this->assertEquals('email', $trait->getEmail());
    }

    public function test_getCustom_setCustom()
    {
        $trait = $this->getMockBuilder(TransactionTrait::class)
            ->getMockForTrait();

        $trait->setCustom(['foo', 'bar']);

        $this->assertEquals(['foo', 'bar'], $trait->getCustom());
    }
}
