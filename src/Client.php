<?php

namespace GoogleSuggest;

class Client
{
    private $home_language;
    private $region;

    public function __construct(array $options=[])
    {
        if (isset($options['client']))
            $this->client = $options['client'];

        $this->home_language = @$options['home_language'] ?: 'en';
        $this->region = @$options['region'];
    }

    public function getHomeLanguage()
    {
        return $this->home_language;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function suggestFor($words)
    {
        // TODO: Implement here, this is fake implementation
        return ['a', 'b'];
    }
}