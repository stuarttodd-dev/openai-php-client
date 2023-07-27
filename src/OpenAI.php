<?php

namespace Stuarttodd\OpenAiPhpClient;

use Stuarttodd\OpenAiPhpClient\Interfaces\ClientInterface;
use Stuarttodd\OpenAiPhpClient\Interfaces\FactoryInterface;

class OpenAI implements FactoryInterface
{
    public static function client(string $apiKey): ClientInterface
    {
        return new Client($apiKey);
    }
}