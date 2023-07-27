<?php

use PHPUnit\Framework\TestCase;
use Stuarttodd\OpenAiPhpClient\OpenAI;

class FetchTest extends TestCase
{
    protected function setUp(): void
    {
        $this->apiKey = 'API_KEY';
        $this->config = [
            'temperature' => 0.9,
            'model' => 'davinci',
        ];
    }

    /**
     * TO DO
     * @return void
     */
    public function testChatCompletionFetch()
    {
//        $library = OpenAI::client($this->apiKey)
//            ->chatCompletions()
//            ->setConfig($this->config);
//
//        $this->assertEquals($this->config, $library->getConfig());
//
//        $response = $library->fetch();
//
//        $this->assertEquals('', $response);
    }

}
