<?php

namespace App\Services;


use App\DTO\RubberDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class MaterialService
{
    public static function findRubber(): Collection
    {
        $context = view('openai.context.rubberfinder')->render();
        $message = view('openai.messages.rubber')->render();

        if (Cache::has('openai_suggestions')) {
            $suggestions = Cache::get('openai_suggestions');
        } else {
            $suggestions = OpenAIService::sendOpenAIMessage($message, $context, true);
            Cache::put('openai_suggestions', $suggestions);
        }

        $result = collect([]);

        foreach($suggestions['suggestions'] as $suggestion) {
            $result->add(RubberDTO::from(json_encode($suggestion)));
        }

        ray($result);
        return $result;
    }

    public static function findBlade(): void
    {
        return;
    }
}
