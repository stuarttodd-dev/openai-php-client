<?php

namespace Stuarttodd\OpenAiPhpClient\Abstractions;

use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;

class LibraryAbstraction implements LibraryInterface
{
    protected array $config = [];
    protected string $model;
    protected string $temperature;
    protected string $message;

    public function __construct(private string $apiKey)
    {

    }

    public function getEndpoint(): string
    {
        return $this->endpoint->value;
    }

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function build(): self
    {
        return $this;
    }

    public function fetch(): string
    {
        return 'Not yet implemented';
    }

}