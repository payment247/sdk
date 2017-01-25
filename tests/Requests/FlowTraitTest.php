<?php

namespace Payment247\SDK\Tests\Requests;

use Payment247\SDK\Requests\FlowTrait;
use Payment247\SDK\Requests\IFlow;

class FlowTraitTest extends \PHPUnit_Framework_TestCase
{
    public function test_setSimpleFlow()
    {
        $trait = $this->getMockBuilder(FlowTrait::class)
            ->getMockForTrait();

        $trait->setSimpleFlow();

        $this->assertEquals(IFlow::SIMPLE_FLOW, $trait->getFlow());
    }

    public function test_setAutoprocessFlow()
    {
        $trait = $this->getMockBuilder(FlowTrait::class)
            ->getMockForTrait();

        $trait->setAutoprocessFlow();

        $this->assertEquals(IFlow::AUTOPROCESS_FLOW, $trait->getFlow());
    }
}
