<?php

namespace GoogleSuggest\Tests;

use GoogleSuggest\Client;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

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

    public function testReturnSuggestWordsForGivenOneWord2()
    {
        $mock = new MockHandler([
            new Response(200,
                ['Content-Type' => 'text/xml; charset=Shift_JIS'],
                file_get_contents(__DIR__ . '/sample_ja.xml'))
        ]);
        $handler = HandlerStack::create($mock);
        $http_client = new HttpClient(['handler' => $handler]);

        $client = new Client([
            'client' => $http_client,
            'home_language' => 'ja',
            'region' => 'com'
        ]);

        $suggestions = $client->suggestFor('google');
        $this->assertContains('google 翻訳', $suggestions);
    }
}