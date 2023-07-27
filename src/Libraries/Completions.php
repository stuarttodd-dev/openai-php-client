<?php

namespace Stuarttodd\OpenAiPhpClient\Libraries;

use Stuarttodd\OpenAiPhpClient\Enums\Endpoint;
use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;
use Stuarttodd\OpenAiPhpClient\Abstractions\LibraryAbstraction;

class Completions extends LibraryAbstraction implements LibraryInterface
{
    public Endpoint $endpoint = Endpoint::COMPLETIONS;
}