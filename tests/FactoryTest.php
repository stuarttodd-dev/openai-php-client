<?php

use PHPUnit\Framework\TestCase;
use Stuarttodd\OpenAiPhpClient\OpenAI;
use Stuarttodd\OpenAiPhpClient\Interfaces\ClientInterface;

class FactoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->apiKey = 'API_KEY';
        $this->client = OpenAI::client($this->apiKey);
    }

    public function testReturnsCorrectInterfaceInstance()
    {
        $this->assertInstanceOf(ClientInterface::class, $this->client);
    }

    public function testGetApiKeyReturnsTheCorrectString()
    {
        $this->assertEquals($this->apiKey, $this->client->getApiKey());
    }

}
