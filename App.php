<?php

//declare(strict_types=1);

require_once 'UniversitiesAPI.php';
require_once 'University.php';
require_once 'UniversityCollection.php';

echo 'Enter country: ';
$country = trim(readline());

if (empty($country)) {
    exit("Search term cannot be empty.\n");
}

$api = 'http://universities.hipolabs.com/search?country=';

$apiFetcher = new UniversitiesAPI($api);
$collection = $apiFetcher->search($country);

if (empty($collection->getUniversities())) {
    exit("No records found. \n");
}

foreach ($collection->getUniversities() as $university) {
    echo "Name: " . $university->getName() . PHP_EOL;
    echo "Country: " . $university->getCountry() . PHP_EOL;
    echo "Web page: " . implode(", ", $university->getWebPages()) . PHP_EOL;
    echo "-------------------------------------------------------------" . PHP_EOL;
}


