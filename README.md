# CloudDark OpenRouter PHP Library

A simple PHP library to interact with the [OpenRouter API](https://openrouter.ai). This library allows you to send chat messages to the API in both stream and non-stream modes.

## Features

- Support for **streaming** and **non-streaming** modes.
- Ability to change the **API token** and **model**.
- Simple and easy-to-use interface.

## Installation

To use the library, follow these steps:

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/cloud-dark/openrouter.git
```

### 2. Install Dependencies with Composer

Navigate to the project directory and install dependencies using Composer:

```bash
cd openrouter
composer install
```

### 3. Autoloading

The library uses Composer's autoloading feature. Simply include the Composer autoload file in your project:

```php
require_once 'vendor/autoload.php';
```

## Usage

### 1. Basic Example

Here's how you can use the library to send a message to the OpenRouter API:

```php
require_once 'path/to/OpenRouter.php';

use CloudDark\OpenRouter\OpenRouter;

// Instantiate the OpenRouter class with your API token
$openRouter = new OpenRouter("your-api-token");

// Define the message to send
$messages = [
    ["role" => "user", "content" => "Hello"]
];

// Send a message using **non-streaming** mode
$responseNonStream = $openRouter->chat($messages, false);
echo "Response (Non-Stream): " . $responseNonStream . "\n";

// Send a message using **streaming** mode
$responseStream = $openRouter->chat($messages, true);
echo "Response (Stream): " . $responseStream . "\n";
```

### 2. Set Custom Model

You can customize the model used for the request. For example, to change the model:

```php
$openRouter->setModel("mistralai/other-model-name");
```

### 3. Change API Token

If you need to change the API token, you can do so by calling the `setToken` method:

```php
$openRouter->setToken("your-new-api-token");
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
