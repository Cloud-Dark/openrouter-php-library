<?php

// Ensure Composer autoloader is loaded
require 'vendor/autoload.php';  // No need for full path when using Composer autoload

use CloudDark\OpenRouter\OpenRouter;  // Use the appropriate namespace

// Create an instance of OpenRouter for non-streaming
$openRouter = new OpenRouter(
    'your-api-token', // Your OpenRouter API token
    'mistralai/mixtral-8x7b-instruct' // Model (optional, default is "mistralai/mixtral-8x7b-instruct")
);

// Prepare the message to send
$messages = [
    [
        'role' => 'system',
        'content' => 'You are an AI assistant.'
    ],
    [
        'role' => 'user',
        'content' => 'Hello, AI!'
    ]
];

// Send the request and get the response
$response = json_decode($openRouter->chat($messages, false));

// Output the response
print_r($response);
?>