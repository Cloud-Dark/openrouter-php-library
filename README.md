# CloudDark OpenRouter PHP Library

This is a simple PHP wrapper to interact with the [OpenRouter API](https://openrouter.ai). The wrapper allows you to send messages to the OpenRouter AI model and get responses in both **streaming** and **non-streaming** modes.

## Requirements

- PHP 7.4 or higher
- Composer

## Installation

To get started, you can install the package via Composer.

### 1. Clone the repository or initialize it in your project:

```bash
composer require cloud-dark/openrouter:dev-main
```

### 2. Upgrade dependencies using Composer:

```bash
composer upgrade && composer update
```

This will install the necessary dependencies and set up the autoloader.

## Usage

Once installed, you can use the `OpenRouter` class to send requests to the OpenRouter API.

### Example PHP Code

#### 1. **Non-Streaming (Standard Request)**

```php
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
$response = json_decode($openRouter->chat($messages, true));

// Output the response
print_r($response);
?>
```

#### 2. **Streaming (Real-time Request)**

```php
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
```

### Expected Response

The expected response from the OpenRouter API can vary based on the mode.

#### Non-Streaming Response:

The response for non-streaming will be a complete JSON object, similar to:

```
stdClass Object
(
    [id] => gen-1738686490-prk4jkf3l7In1GdYKoAI
    [provider] => DeepInfra
    [model] => mistralai/mixtral-8x7b-instruct
    [object] => chat.completion
    [created] => 1738686490
    [choices] => Array
        (
            [0] => stdClass Object
                (
                    [logprobs] =>
                    [finish_reason] => stop
                    [native_finish_reason] => stop
                    [index] => 0
                    [message] => stdClass Object
                        (
                            [role] => assistant
                            [content] =>  Hello! How can I assist you today? I'm here to help answer your questions, provide information, and facilitate any tasks you need help with. Let me know what you need.
                            [refusal] =>
                        )

                )

        )

    [usage] => stdClass Object
        (
            [prompt_tokens] => 19
            [completion_tokens] => 38
            [total_tokens] => 57
        )

)
```

#### Streaming Response:

In the case of streaming, the data will be received and output in real-time. The response will be directly displayed as it is processed, which could look like:

```json
"Hello! It's nice to meet you. I'm here to help answer any questions..."
```

The output will be displayed as chunks of data in the browser as they are received from the API.

## Customization

You can customize the `OpenRouter` class by adjusting the URL, token, or model that you're using to interact with the OpenRouter API.

- **Set Token:** `setToken('your-api-token')`
- **Set Model:** `setModel('your-model-id')`
- **Enable/Disable Streaming:** `chat($messages, true)` for streaming or `chat($messages, false)` for non-streaming.

## License

This project is open-source and available under the [MIT License](LICENSE).
