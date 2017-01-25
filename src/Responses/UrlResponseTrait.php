<?php

namespace Payment247\SDK\Responses;

trait UrlResponseTrait
{
    /** @var string */
    protected $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return void
     */
    protected function setupUrl()
    {
        $this->url = $this->raw['url'];
    }
}
