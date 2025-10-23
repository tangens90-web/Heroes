@props(['value' => null, 'options' => []])

<select {{ $attributes }}>
    @foreach ($options as $key => $text)
        <option value="{{ $key }}" @if((string)$key === (string)$value) selected @endif>
            {{ $text }}
        </option>
    @endforeach
</select>