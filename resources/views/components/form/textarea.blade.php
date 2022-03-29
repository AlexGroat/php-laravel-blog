@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea 
    name="{{ $name }}" 
    id="{{ $name }}" 
    class="w-full text-sm focus:outline-none focus:ring border border-gray-400" 
    rows="5" 
    placeholder="Insert your post {{ $name }} here." 
    required>{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>