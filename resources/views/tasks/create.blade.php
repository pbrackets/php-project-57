@extends('layouts.app')
@section('content')

    @auth()
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl text-white">{{ __('layout.tasks_create') }}</h1>

            {{  html()->form('POST', route('tasks.store'))->addClass('w-50')->open() }}
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
                <div class="mt-4">
                    {{  html()->label(__('layout.table_description'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->textarea('description', '')->addClass(['rounded', 'border-gray-300', 'w-1/3', 'h-32']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('description') }}
                @endif
                <div class="mt-4">
                    {{  html()->label(__('layout.table_status'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->select('status_id', $statuses)->addClass(['form-select', 'ml-2', 'rounded', 'border-gray-300'])->placeholder('выбрать статус') }}
{{--                    {{  html()->select('status_id', $statuses, $task->status_id)->addClass(['form-select', 'ml-2', 'rounded', 'border-gray-300'])->placeholder('----------') }}--}}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('status_id') }}
                    @endif
                </div>
                <div class="mt-4">
                    {{  html()->label(__('layout.table_assigned'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{ html()->select('assigned_to_id', $users, null)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3'])->placeholder('----------') }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('assigned_to_id') }}
                    @endif
                </div>
                <div class="mt-4">
                    {{  html()->label(__('layout.labels'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{ html()->select('labels[]', $labels, null)->addclass(['form-control', 'rounded', 'border-gray-300', 'w-1/3', 'h-32', 'multiple']) }}
                </div>
                <div class="mt-2">
                    {{ html()->submit(__('layout.tasks_create'))->addClass(['bg-white hover:bg-grey text-white font-bold py-2 px-4 rounded']) }}
                </div>
                @csrf
{{--                <a href="{{ route('tasks.create') }}"--}}
{{--                   class="bg-white hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                    {{ __('layout.tasks_create') }}--}}
{{--                </a>--}}
            </div>
            {{ html()->form()->close() }}
        </div>
    @endauth

@endsection

