<?php


namespace App\Services;

use OpenAI;
use OpenAI\Client;

class OpenAIService
{
    private static function getOpenAIClient(): Client
    {
        return OpenAI::client(getenv('OPENAI_API_KEY'), getenv('OPENAI_ORGANIZATION_ID'));
    }

    public static function sendOpenAIMessage(string $message, ?string $context = null): string
    {
        $client = self::getOpenAIClient();

        $messages = [
            ['role' => 'user', 'content' => $message]
        ];

        if ($context !== null) {
            $messages[] = ['role' => 'system', 'content' => $context];
        }

        $result = $client->chat()->create([
            'model' => 'gpt-4o',
            'messages' => $messages
        ]);

        return $result->choices[0]->message->content;
    }
}
