<?php

use App\Services\MaterialService;
use function Livewire\Volt\{state};

state(['suggestions']);

$getRubberSuggestion = function () {
    $this->suggestions = MaterialService::findRubber()->toArray();
}

?>

<div>
    Volt Belagfinder
    <button wire:click="getRubberSuggestion">Suggest</button>
    @if ($this->suggestions)
        <ul>
        @foreach($this->suggestions as $suggestion)
            <li>Name: {{ $suggestion['name'] }}</li>
        @endforeach
        </ul>
    @endif
</div>
