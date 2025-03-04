
@extends('layouts.app')
@section('content')

    @auth()
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ __('layout.tasks_edit') }}</h1>
            {{  html()->form('PATCH', route('tasks.update', $task))->addClass('w-50')->open() }}
            <div class="flex flex-col">
                <div>
                    {{  html()->label(__('layout.table_name'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->text('name', $task->name)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3']) }}
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
                    {{  html()->textarea('description', $task->description)->addClass(['rounded', 'border-gray-300', 'w-1/3', 'h-32']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('description') }}
                @endif
                <div class="mt-4">
                    {{  html()->label(__('layout.table_status'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->select('status_id', $statuses, $task->status_id)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3'])->placeholder('----------') }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('status_id') }}
                @endif
                <div class="mt-4">
                    {{  html()->label(__('layout.table_assigned'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->select('assigned_to_id', $users, $task->assigned_to_id)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3'])->placeholder('----------') }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('assigned_to_id') }}
                @endif
                <div class="mt-4">
                    {{  html()->label(__('layout.labels'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{  html()->select('labels[]', $labels, $task->labels)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3', 'h-32'])->multiple('multiple')->placeholder('') }}
                </div>
                <div class="mt-4">
                    {{  html()->submit(__('layout.update_button'))->addClass(['bg-white', 'hover:bg-gray-700', 'text-black', 'font-bold', 'py-2', 'px-4', 'rounded']) }}
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    @endauth

@endsection
