<?php

namespace Stuarttodd\OpenAiPhpClient\Enums;

enum Endpoint: string
{
    case COMPLETIONS = 'https://api.openai.com/v1/completions';
    case CHAT_COMPLETIONS = 'https://api.openai.com/v1/chat/completions';
    case EDITS = 'https://api.openai.com/edits';
    case IMAGE_GENERATIONS = 'https://api.openai.com/v1/images/generations';
    case IMAGE_EDITS = 'https://api.openai.com/v1/images/edits';
    case IMAGE_VARIATIONS = 'https://api.openai.com/v1/images/variations';
    case EMBEDDINGS = 'https://api.openai.com/v1/embeddings';
    case AUDIO_TRANSCRIPTIONS = 'https://api.openai.com/v1/audio/transcriptions';
    case AUDIO_TRANSLATIONS = 'https://api.openai.com/v1/audio/translations';
    case FILES = 'https://api.openai.com/v1/files';
    case FINE_TUNES = 'https://api.openai.com/v1/fine-tunes';
    case MODERATIONS = 'https://api.openai.com/v1/moderations';
}