
@props([
    'required' => false,
    'name' => null,
    'type' => 'text',
    'id' => null,
    'value' => '',
    'label' => '',
    'labelClass' =>'',
    'inputClass'=>''
    'placeholder' => null,
])

<div class="mb-4">
    {{-- Метка --}}
    <label
        {{ $attributes->class([
            'block mb-2 text-sm  font-medium text-[#292929] dark:text-white font-[Inter]',
            $required ? 'required' : '',
            $labelClass
        ]) }}
        @if ($id) for="{{ $id }}" @endif>
        {{ $slot ?? $label }}
    </label>

    {{-- Поле ввода --}}
    <input
        {{ $attributes->merge([
            'type' => $type,
            'name' => $name,
            'placeholder' => $placeholder,
            'id' => $id ?? $name,
            'value' => $type !== 'password' ? old($name) ?? $value : null,
            'class' =>
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-[500px]',
                $inputClass
              
        ]) }}
        @if ($required) required @endif />
</div>
