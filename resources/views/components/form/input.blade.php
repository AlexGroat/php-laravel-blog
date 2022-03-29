@props(['name', 'type' => 'text'])
<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="border border-gray-400 w-full" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" required>

    <x-form.error name="{{ $name }}" />
</x-form.field>