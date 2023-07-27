<?php

namespace Stuarttodd\OpenAiPhpClient\Libraries;

use Stuarttodd\OpenAiPhpClient\Enums\Endpoint;
use Stuarttodd\OpenAiPhpClient\Interfaces\LibraryInterface;
use Stuarttodd\OpenAiPhpClient\Abstractions\LibraryAbstraction;

class ImageVariations extends LibraryAbstraction implements LibraryInterface
{
    public Endpoint $endpoint = Endpoint::IMAGE_VARIATIONS;
}