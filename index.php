<?php

require_once 'UniversitiesAPI.php';
require_once 'University.php';
require_once 'UniversityCollection.php';
require_once 'App.php';

$universitiesAPI = new UniversitiesAPI('http://universities.hipolabs.com/search?country=', '');

$app = new App($universitiesAPI);
$app->run();
