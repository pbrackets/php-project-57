@extends('layouts.app')
@section('content')
<div class="text-white">Привет</div>
{{--    @auth()--}}
{{--        <div class="grid col-span-full">--}}
{{--            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ __('layout.task_statuses_edit') }}</h1>--}}
{{--            {{  html()->form('PATCH', route('task_statuses.update', $taskStatus))->addClass('w-50')->open() }}--}}
{{--            <div class="flex flex-col">--}}
{{--                <div>--}}
{{--                    {{ html()->label(__('layout.table_name'))->addClass(['text-write']) }}--}}
{{--                </div>--}}
{{--                <div class="mt-2">--}}
{{--                    {{ html()->text('name', $taskStatus->name)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3']) }}--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @if ($errors->any())--}}
{{--                        {{ $errors->first('name') }}--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class="mt-2">--}}
{{--                    {{ html()->submit(__('layout.update_button'))->addClass(['bg-white', 'hover:bg-gra', 'text-black', 'font-bold', 'py-2', 'px-4', 'rounded']) }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ html()->form()->close() }}--}}
{{--        </div>--}}
{{--    @endauth--}}

@endsection
