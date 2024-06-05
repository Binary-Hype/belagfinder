<?php

use App\Services\MaterialService;
use function Livewire\Volt\{state};

state([
    'suggestions',
    'speed',
    'style',
    'type',
    'other'
]);

$getRubberSuggestion = function () {
//    $this->suggestions = MaterialService::findRubber()->toArray();
    ray($this->other);
}

?>

<div>
    Volt Belagfinder
    <form wire:submit.prevent="getRubberSuggestion">
        <div>
            <input wire:model="speed" type="radio" name="speed" value="langsam">
            <input wire:model="speed" type="radio" name="speed" value="mittel">
            <input wire:model="speed" type="radio" name="speed" value="schnell">
        </div>

        <div>
            <input wire:model="style" type="radio" name="style" value="defensiv">
            <input wire:model="style" type="radio" name="style" value="allround">
            <input wire:model="style" type="radio" name="style" value="offensiv">
        </div>
        <div>
            <input wire:model="type" type="radio" name="type" value="Noppen innen">
            <input wire:model="type" type="radio" name="type" value="Lange Noppen">
            <input wire:model="type" type="radio" name="type" value="Kurze Noppen">
            <input wire:model="type" type="radio" name="type" value="AntiTop">
        </div>
        <div>
            <textarea wire:model="other" name="other"></textarea>
        </div>
        <button type="submit">Suggest</button>
    </form>
    @if ($this->suggestions)
        <ul>
            @foreach($this->suggestions as $suggestion)
                <li>
                    <div>Name: {{ $suggestion['name'] }}</div>
                    <div>Spin: {{ $suggestion['spin'] }}</div>
                    <div>Geschindigkeit: {{ $suggestion['speed'] }}</div>
                    <div>Empfohlene Dicke des Schwammes: {{ str_replace('.', ',', $suggestion['thickness']) }} mm</div>
                    <div>Beschreibung: {{ $suggestion['description'] }}</div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
