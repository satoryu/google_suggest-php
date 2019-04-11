<?php

namespace GoogleSuggest;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

class Client
{
    private $home_language;
    private $region;

    public function __construct(array $options=[], ClientInterface $client=null)
    {
        $this->client = $client ?: new HttpClient;
        $this->home_language = $options['home_language'] ?? 'en';
        $this->region = $options['region'] ?? null;
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
        $query = [
            'hl' => $this->getHomeLanguage(),
            'q' => $words,
            'output' => 'toolbar'
        ];
        $uri = new Uri('https://www.google.com/complete/search');
        $uri = $uri->withQuery(http_build_query($query));
        $request = new Request('GET', $uri);

        try {
            $response = $this->client->send($request);
        } catch(\Exception $error) {
            throw $error;
        }

        $body = mb_convert_encoding((string) $response->getBody(), 'UTF-8', 'Shift_JIS');
        $xml = new \SimpleXMLElement($body);
        $suggestions = [];
        foreach($xml->CompleteSuggestion as $suggestion) {
            $suggestions[] = (string)$suggestion->suggestion['data'];
        }

        return $suggestions;
    }
}