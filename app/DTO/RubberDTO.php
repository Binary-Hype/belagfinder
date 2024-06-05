<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class RubberDTO extends Data
{
    public function __construct(
        public string $name,
        public string $spin,
        public string $speed,
        public float  $thickness,
        public string $description
    )
    {

    }
}
