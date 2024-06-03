<?php

namespace App\Services;


class MaterialService
{
    public static function findRubber()
    {
        return OpenAIService::sendOpenAIMessage("welchen Belag empfiehlst du für einen Anfänger der gerne offensiv spielt?", "Du bist ein Berater für Tischtennis Ausstattung.");
    }

    public static function findBlade()
    {

    }
}
