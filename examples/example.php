<?php

require_once '../vendor/autoload.php';

use CloudDark\OpenRouter\OpenRouter;

// Gantilah dengan token API Anda
$openRouter = new OpenRouter("your-api-token");

// Pesan yang dikirim ke OpenRouter
$messages = [
    ["role" => "user", "content" => "Hello"]
];

// Mode non-stream
$responseNonStream = $openRouter->chat($messages, false);
echo "Response (Non-Stream): " . $responseNonStream . "\n";

// Mode stream
$responseStream = $openRouter->chat($messages, true);
echo "Response (Stream): " . $responseStream . "\n";
