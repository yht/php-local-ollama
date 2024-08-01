<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use JDecool\OllamaClient\ClientBuilder;
use JDecool\OllamaClient\Client\Message;
use JDecool\OllamaClient\Client\Request\ChatRequest;

$builder = new ClientBuilder();
$client = $builder->create();

$request = new ChatRequest('llama3.1:8b-instruct-q4_1', [
    new Message('user', 'Why is the sky blue?'),
]);

// sync
//var_dump($client->chat($request));

// async
//foreach ($client->chatStream($request) as $chunk) {
//    var_dump($chunk);
//}

// Print just message
//echo nl2br($client->chat($request)->message->content);

// JSON 
echo json_encode($client->chat($request));
