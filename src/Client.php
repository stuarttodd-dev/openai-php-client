<?php

namespace Stuarttodd\OpenAiPhpClient;

use Stuarttodd\OpenAiPhpClient\Libraries\AudioTranscriptions;
use Stuarttodd\OpenAiPhpClient\Libraries\AudioTranslations;
use Stuarttodd\OpenAiPhpClient\Libraries\ChatCompletions;
use Stuarttodd\OpenAiPhpClient\Libraries\Completions;
use Stuarttodd\OpenAiPhpClient\Libraries\Edits;
use Stuarttodd\OpenAiPhpClient\Libraries\Embeddings;
use Stuarttodd\OpenAiPhpClient\Libraries\Files;
use Stuarttodd\OpenAiPhpClient\Libraries\FileTunes;
use Stuarttodd\OpenAiPhpClient\Libraries\ImageEdits;
use Stuarttodd\OpenAiPhpClient\Libraries\ImageGenerations;
use Stuarttodd\OpenAiPhpClient\Libraries\ImageVariations;
use Stuarttodd\OpenAiPhpClient\Libraries\Moderations;
use Stuarttodd\OpenAiPhpClient\Interfaces\ClientInterface;
use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;
use Stuarttodd\OpenAiPhpClient\Exceptions\LibraryNotSetException;

use Closure;

class Client implements ClientInterface
{
    public LibraryInterface $library;

    public function __construct(private string $apiKey)
    {

    }

    public function completions(): self
    {
        $this->library = new Completions($this->apiKey);
        return $this;
    }

    public function chatCompletions(): self
    {
        $this->library = new ChatCompletions($this->apiKey);
        return $this;
    }

    public function edits(): self
    {
        $this->library = new Edits($this->apiKey);
        return $this;
    }

    public function imageGenerations(): self
    {
        $this->library = new ImageGenerations($this->apiKey);
        return $this;
    }

    public function imageEdits(): self
    {
        $this->library = new ImageEdits($this->apiKey);
        return $this;
    }

    public function imageVariations(): self
    {
        $this->library = new ImageVariations($this->apiKey);
        return $this;
    }

    public function embeddings(): self
    {
        $this->library = new Embeddings($this->apiKey);
        return $this;
    }

    public function audioTranscriptions(): self
    {
        $this->library = new AudioTranscriptions($this->apiKey);
        return $this;
    }

    public function audioTranslations(): self
    {
        $this->library = new AudioTranslations($this->apiKey);
        return $this;
    }

    public function files(): self
    {
        $this->library = new Files($this->apiKey);
        return $this;
    }

    public function fileTunes(): self
    {
        $this->library = new FileTunes($this->apiKey);
        return $this;
    }

    public function moderations(): self
    {
        $this->library = new Moderations($this->apiKey);
        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setConfig(array $config): self
    {
        if (empty($this->library)) {
            throw new LibraryNotSetException();
        }

        $this->library->setConfig($config);
        return $this;
    }

    public function getConfig(): array
    {
        if (empty($this->library)) {
            throw new LibraryNotSetException();
        }

        return $this->library->getConfig();
    }

    public function getEndpoint(): string
    {
        if (empty($this->library)) {
            throw new LibraryNotSetException();
        }

        return $this->library->getEndpoint();
    }

    public function fetch(?Closure $fn = null): string
    {
        if (empty($this->library)) {
            throw new LibraryNotSetException();
        }

        $response = $this->library->build()->fetch();

        if (is_callable($fn)) {
            return $fn($response);
        }

        return $response;
    }

}