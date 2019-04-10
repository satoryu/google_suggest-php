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

    public function testGiveOptionsToConstructor()
    {
        $client = new Client([
            'home_language' => 'ja',
            'region' => 'us'
        ]);

        $this->assertEquals($client->getHomeLanguage(), 'ja');
        $this->assertEquals($client->getRegion(), 'us');
    }

    public function testReturnSuggestWordsForGivenOneWord()
    {
        $client = new Client;

        $suggestions = $client->suggestFor('google');
        $this->assertContainsOnly('string', $suggestions);
    }
}