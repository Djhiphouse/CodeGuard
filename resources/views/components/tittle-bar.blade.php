@props([
    'title' => 'Tittle',
    'value' => '',
])

<div class="w-full sm:w-full ml-3 sm:ml-0 sm:p-5 rounded bg-gray-800 border-b border-b-gray-900 flex flex-row items-center justify-center space-x-2 h-16 sm:h-8">
    <h1>{{$title}}</h1> <h1 class="font-bold ">{{$value}}</h1>
</div>
