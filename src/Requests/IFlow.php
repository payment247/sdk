<?php

namespace Payment247\SDK\Requests;

interface IFlow
{
    const SIMPLE_FLOW = 'simple';
    const AUTOPROCESS_FLOW = 'auto_process';

    /**
     * @return void
     */
    public function setSimpleFlow();

    /**
     * @return void
     */
    public function setAutoprocessFlow();

    /**
     * @return string
     */
    public function getFlow();
}
