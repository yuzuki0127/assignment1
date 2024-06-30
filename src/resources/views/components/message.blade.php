@props(['message'])

@if ($message)
<div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ $message }}
</div>
@endif