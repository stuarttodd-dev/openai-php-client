<?php

namespace Stuarttodd\OpenAiPhpClient\Interfaces;

use Closure;

interface ClientInterface
{
    public function completions(): self;
    public function chatCompletions(): self;
    public function edits(): self;
    public function imageGenerations(): self;
    public function imageEdits(): self;
    public function imageVariations(): self;
    public function embeddings(): self;
    public function audioTranscriptions(): self;
    public function audioTranslations(): self;
    public function files(): self;
    public function fileTunes(): self;
    public function moderations(): self;

    public function getApiKey(): string;
    public function getEndpoint(): string;
    public function setConfig(array $config): self;

    public function getConfig(): array;
    public function fetch(?Closure $fn = null): string;
}
