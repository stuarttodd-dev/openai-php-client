<?php

use PHPUnit\Framework\TestCase;
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
use Stuarttodd\OpenAiPhpClient\OpenAI;
use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;
use Stuarttodd\OpenAiPhpClient\Enums\Endpoint;
use Stuarttodd\OpenAiPhpClient\Exceptions\LibraryNotSetException;

class ClientTest extends TestCase
{
    protected function setUp(): void
    {
        $this->apiKey = 'API_KEY';
        $this->client = OpenAI::client($this->apiKey);
    }

    public function testLibrariesAreCorrectlySet()
    {
        $this->client->completions();
        $this->assertEquals(Completions::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->chatCompletions();
        $this->assertEquals(ChatCompletions::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->edits();
        $this->assertEquals(Edits::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->imageGenerations();
        $this->assertEquals(ImageGenerations::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->imageEdits();
        $this->assertEquals(ImageEdits::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->imageVariations();
        $this->assertEquals(ImageVariations::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->embeddings();
        $this->assertEquals(Embeddings::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->audioTranscriptions();
        $this->assertEquals(AudioTranscriptions::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->audioTranslations();
        $this->assertEquals(AudioTranslations::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->files();
        $this->assertEquals(Files::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->fileTunes();
        $this->assertEquals(FileTunes::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);

        $this->client->moderations();
        $this->assertEquals(Moderations::class, $this->client->library::class);
        $this->assertInstanceOf(LibraryInterface::class, $this->client->library);
    }

    public function testConfigCanBeSetAndGetCorrectly()
    {
        $config = [
            'Something' => 'Else'
        ];

        $this->client->completions()->setConfig($config);
        $this->assertEquals($config, $this->client->getConfig());
    }

    public function testGetEndpointReturnsTheCorrectString()
    {
        $this->assertEquals(Endpoint::COMPLETIONS->value, $this->client->completions()->getEndpoint());
        $this->assertEquals(Endpoint::CHAT_COMPLETIONS->value, $this->client->chatCompletions()->getEndpoint());
        $this->assertEquals(Endpoint::EDITS->value, $this->client->edits()->getEndpoint());
        $this->assertEquals(Endpoint::IMAGE_GENERATIONS->value, $this->client->imageGenerations()->getEndpoint());
        $this->assertEquals(Endpoint::IMAGE_EDITS->value, $this->client->imageEdits()->getEndpoint());
        $this->assertEquals(Endpoint::IMAGE_VARIATIONS->value, $this->client->imageVariations()->getEndpoint());
        $this->assertEquals(Endpoint::EMBEDDINGS->value, $this->client->embeddings()->getEndpoint());
        $this->assertEquals(Endpoint::AUDIO_TRANSCRIPTIONS->value, $this->client->audioTranscriptions()->getEndpoint());
        $this->assertEquals(Endpoint::AUDIO_TRANSLATIONS->value, $this->client->audioTranslations()->getEndpoint());
        $this->assertEquals(Endpoint::FILES->value, $this->client->files()->getEndpoint());
        $this->assertEquals(Endpoint::FINE_TUNES->value, $this->client->fileTunes()->getEndpoint());
        $this->assertEquals(Endpoint::MODERATIONS->value, $this->client->moderations()->getEndpoint());
    }

    public function testGetLibraryThrowsExceptionIfNotSet()
    {
        $this->expectException(LibraryNotSetException::class);
        $this->client->getEndpoint();

        $this->expectException(LibraryNotSetException::class);
        $this->client->setConfig(['something' => 'else']);

        $this->expectException(LibraryNotSetException::class);
        $this->client->getConfig();
    }

}
