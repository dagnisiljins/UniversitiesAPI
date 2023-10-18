<?php
function searchUniversities($country = 'United States')
{
    $url = 'http://universities.hipolabs.com/search?country=' . urlencode($country);
    $response = file_get_contents($url);
    $universities = json_decode($response);

    if ($universities) {
        echo "Universities in $country:\n";
        foreach ($universities as $index => $university) {
            echo "University $index:\n";
            echo "Name: {$university->name}\n";
            echo "Country: {$university->country}\n";
            echo "Web Pages: " . implode(", ", $university->web_pages) . "\n";
            echo "------------------------------------------------------------\n";
        }
    } else {
        echo "No universities found for the specified country.\n";
    }
}

echo "Welcome to the Universities Search App\n";

while (true) {
    echo "Options:\n";
    echo "1. Search for universities\n";
    echo "2. Change country\n";
    echo "3. Quit\n";

    $choice = readline('Enter your choice: ');
    echo "------------------------------------------------------------\n";

    switch ($choice) {
        case '1':
            searchUniversities();
            break;
        case '2':
            $country = readline('Enter the country to search for universities: ');
            searchUniversities($country);
            break;
        case '3':
            echo "Goodbye!\n";
            exit;
        default:
            echo "Invalid choice. Please enter a valid option.\n";
    }
}