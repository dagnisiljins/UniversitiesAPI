<?php

declare(strict_types=1);

namespace App;

class UniversitiesAPI
{
    private string $api;


    public function __construct(string $api)
    {
        $this->api = $api;

    }


    public function search(string $country): ?UniversityCollection {
        $url = $this->api . urlencode($country);
        $response = file_get_contents($url);

        if ($response === false) {
            echo "Failed to fetch data from the API.\n";
            return null;
        }

        $data = json_decode($response);

        if ($data === null) {
            echo "Failed to decode JSON data.\n";
            return null;
        }

        $collection = new UniversityCollection();

        foreach ($data as $index => $university) { //$index var ņemt ārā
            $collection->add(new University(
                $university->name,
                $university->country,
                (array)$university->web_pages
            ));
        }

        return $collection;
    }
}
