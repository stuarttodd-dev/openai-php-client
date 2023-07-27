<?php

namespace Stuarttodd\OpenAiPhpClient\Interfaces;

interface FactoryInterface
{
    public static function client(string $apiKey): ClientInterface;
}
