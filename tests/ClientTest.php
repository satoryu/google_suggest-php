<?php

namespace GoogleSuggest\Tests;

use GoogleSuggest\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testConstructor()
    {
        $client = new Client();

        $this->assertTrue(true);
    }
}