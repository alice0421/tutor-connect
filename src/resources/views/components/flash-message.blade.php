@props(['message' => '-', 'type' => 'success'])

@php
function backgroundColor($type){
    $result = '';
    switch($type){
        case 'success':
            $result = 'bg-green-200';
            break;
        case 'info':
            $result = 'bg-blue-200';
            break;
        case 'error':
            $result = 'bg-red-200';
            break;
        case 'warning':
            $result = 'bg-yellow-200';
            break;
        defalut:
            $result = 'bg-green-200';
    }
    return $result;
}

function textColor($type){
    $result = '';
    switch($type){
        case 'success':
            $result = 'text-green-600 hover:text-green-800';
            break;
        case 'info':
            $result = 'text-blue-600 hover:text-blue-800';
            break;
        case 'error':
            $result = 'text-red-600 hover:text-red-800';
            break;
        case 'warning':
            $result = 'text-yellow-600 hover:text-yellow-800';
            break;
        default:
            $result = 'text-green-600 hover:text-green-800';
    }
    return $result;
}
@endphp

<div x-data="{ open: true }" :class="{ 'hidden': !open }" {{ $attributes->merge(['class' => 'flex items-center w-[600px] p-4 text-gray-600 rounded-lg shadow '.backgroundColor($type)])}}>
    <button type="button" @click="open = !open" class="text-bold text-2xl rounded-lg p-1 inline-flex items-center justify-center h-8 w-8 {{ textColor($type) }}">
        ✗
    </button>
    <div class="ml-3 text-sm font-semibold">{{ $message }}</div>
</div>
