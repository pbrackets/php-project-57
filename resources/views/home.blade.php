@extends('layouts.app')
@section('content')

    <div class="mr-auto place-self-center lg:col-span-7">
        <h1 class="text-2xl text-white">
            Привет от Хекслета!
        </h1>
        <p class="mb-6 text-white">
            Это простой менеджер задач на Laravel
        </p>
        <div>
            <a href="https://hexlet.io"label_task
               class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
               target="_blank">
                Нажми меня
            </a>
        </div>
    </div>

@endsection
