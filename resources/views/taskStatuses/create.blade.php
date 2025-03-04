@extends('layouts.app')
@section('content')

    @auth()
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ __('layout.task_statuses_create') }}</h1>

            {{  html()->form('POST', route('task_statuses.store'))->addClass('w-50')->open() }}
            <div class="flex flex-col">
                <div>
                    {{  html()->label(__('layout.table_name'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->text('name', '')->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('name') }}
                    @endif
                </div>
                <div class="mt-2">
                    {{  html()->submit(__('layout.create_button'))->addClass(['bg-white', 'hover:bg-gray-700', 'text-black', 'font-bold', 'py-2', 'px-4', 'rounded']) }}
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    @endauth

@endsection
