@props([
    'selected' => false,
])

<input type="radio" {{ $attributes }} @if($selected) checked @endif>
<label for="{{ $attributes->get("id") }}" class="radio">
  {{ $slot }}
</label>
