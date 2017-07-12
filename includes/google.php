<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'initialize.php';
require_once GOOGLE;

$client = new Google_Client();
$client->setAuthConfig(__DIR__.DIRECTORY_SEPARATOR.'google-client.json');
$client->setScopes(
    array(
      "https://www.googleapis.com/auth/plus.me",
      "https://www.googleapis.com/auth/urlshortener",
      "https://www.googleapis.com/auth/tasks",
      "https://www.googleapis.com/auth/adsense",
      "https://www.googleapis.com/auth/youtube"
    )
);