<?php

declare(strict_types=1);

namespace App;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UniversitiesAPI
{
    private string $api;
    private Client $httpClient;

    public function __construct(string $api)
    {
        $this->api = $api;
        $this->httpClient = new Client();

    }


    public function search(string $country): ?UniversityCollection {
        $url = $this->api . urlencode($country);

        try {
            $response = $this->httpClient->get($url);
        } catch (GuzzleException $e) {
            echo "Failed to fetch data from the API: " . $e->getMessage() . "\n";
            return null;
        }

        $body = $response->getBody()->__toString();
        $data = json_decode($body, true);

        if ($data === false) {
            echo "Failed to fetch data from the API.\n";
            return null;
        }


        if ($data === null) {
            echo "Failed to decode JSON data.\n";
            return null;
        }

        $collection = new UniversityCollection();

        foreach ($data as $university) {
            $collection->add(new University(
                $university['name'],
                $university['country'],
                $university['web_pages']
            ));
        }

        return $collection;
    }
}
