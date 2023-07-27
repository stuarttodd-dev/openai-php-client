# openai-php-client
An OpenAPI PHP Client. This is under construction, however there is some limited functionality available.

## Composer Installation
```bash
composer require stuarttodd/openai-php-client
```

## Chat Completions
```php
<?php

use Stuarttodd\OpenAiPhpClient\OpenAI;

$apiKey = "YOUR_API_KEY_HERE";

$response = OpenAI::client($apiKey)
    ->chatCompletions()
    ->setConfig([
        'model' => 'gpt-3.5-turbo', // if not set, defaults to 'gpt-3.5-turbo'
        'temperature' => 0.9, // if not set, defaults to 0.7
        'message' => 'Tell me you love me' // If not set, defaults to giving you a random Chuck Norris joke
    ])
    ->fetch(function($response) { // use of closure is optional
        return json_decode($response)->choices[0]->message->content;
    }); 

echo $response; // "As an AI, I do not have the capability to feel emotions or love. However, I am here to assist you with any questions or tasks you may have."
```
