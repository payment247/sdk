<?php

namespace Payment247\SDK\Requests;

trait FlowTrait
{
    /**
     * @return void
     */
    public function setSimpleFlow()
    {
        $this->raw['flow'] = IFlow::SIMPLE_FLOW;
    }

    /**
     * @return void
     */
    public function setAutoprocessFlow()
    {
        $this->raw['flow'] = IFlow::AUTOPROCESS_FLOW;
    }

    /**
     * @return string
     */
    public function getFlow()
    {
        return $this->raw['flow'];
    }
}
