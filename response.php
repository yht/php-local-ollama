<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use JDecool\OllamaClient\ClientBuilder;
use JDecool\OllamaClient\Client\Message;
use JDecool\OllamaClient\Client\Request\ChatRequest;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['inputText'];
    $model = $_POST['model'];

    $builder = new ClientBuilder();
    $client = $builder->create();

    $request = new ChatRequest($model, [
        new Message('user', $inputText),
    ]);

    $response = $client->chat($request);
    $responseData = [
        'model' => $model,
        'date' => date('Y-m-d H:i:s'),
        'responsetext' => nl2br($response->message->content)
    ];

    echo json_encode($responseData);
}
?>
