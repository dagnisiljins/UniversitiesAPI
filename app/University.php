<?php

declare(strict_types=1);

namespace App;

class University
{
    private string $name;
    private string $country;
    private array $webPages;

    public function __construct(string $name, string $country, array $webPages)
    {
        $this->name = $name;
        $this->country = $country;
        $this->webPages = $webPages;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getWebPages(): array
    {
        return $this->webPages;
    }

    public function displayWebPages()
    {
        echo "Web Pages: ";
        foreach ($this->webPages as $webPage) {
            echo $webPage . ', ';
        }
        echo PHP_EOL;
    }
}