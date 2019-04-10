<?php

namespace GoogleSuggest\Tests;

use GoogleSuggest\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testConstructorDefault()
    {
        $client = new Client;

        $this->assertEquals($client->getHomeLanguage(), 'en');
        $this->assertNull($client->getRegion());
    }
}