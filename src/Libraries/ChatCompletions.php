<?php

namespace Stuarttodd\OpenAiPhpClient\Libraries;

use Stuarttodd\OpenAiPhpClient\Enums\Defaults;
use Stuarttodd\OpenAiPhpClient\Enums\Endpoint;
use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;
use Stuarttodd\OpenAiPhpClient\Abstractions\LibraryAbstraction;

use GuzzleHttp\Client;

class ChatCompletions extends LibraryAbstraction implements LibraryInterface
{
    public Endpoint $endpoint = Endpoint::CHAT_COMPLETIONS;

    public function build(): self
    {
        $this->model = $this->config['model'] ?? Defaults::DEFAULT_MODEL;
        $this->temperature = $this->config['temperature'] ?? Defaults::DEFAULT_TEMPERATURE;
        $this->message = $this->config['message'] ?? Defaults::DEFAULT_MESSAGE;
        return $this;
    }

    public function fetch(): string
    {
        $request = (new Client())->post($this->getEndpoint(), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getApiKey(),
            ],
            'body' => json_encode([
                'model' => $this->model,
                'temperature' => (float)$this->temperature,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $this->message,
                    ]
                ]
            ])
        ]);

        return $request->getBody()->getContents();
    }
}