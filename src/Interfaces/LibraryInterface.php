<?php

namespace Stuarttodd\OpenAiPhpClient\Interfaces;

interface LibraryInterface
{
    public function getEndpoint(): string;
    public function getApiKey(): string;
    public function getConfig(): array;
    public function setConfig(array $config): void;
    public function build(): self;
    public function fetch(): string;
}
