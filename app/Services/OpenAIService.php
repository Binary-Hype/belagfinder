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

    public static function sendOpenAIMessage(string $message, string $context = '', bool $decodeJson = false): string|array
    {
        $client = self::getOpenAIClient();

        $messages = [
            ['role' => 'user', 'content' => $message]
        ];

        if ($context !== '') {
            $messages[] = ['role' => 'system', 'content' => $context];
        }

        try {
            $result = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages
            ]);

            if (isset($result->choices[0])) {
                if ($decodeJson) {
                    return json_decode($result->choices[0]->message->content, true);
                }

                return $result->choices[0]->message->content;
            }
        } catch (\Exception $e) {
            ray($e->getMessage());
        }

        return '';
    }
}
