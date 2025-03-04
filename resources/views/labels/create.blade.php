@extends('layouts.app')
@section('content')

    @auth()
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">{{ __('layout.labels_create') }}</h1>
            {{  html()->form('POST', route('labels.store'))->addClass('w-50')->open() }}
            <div class="flex flex-col">
                <div>
                    {{ html()->label(__('layout.table_name'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{ html()->text('name', '')->addclass(['form-control', 'rounded', 'border-gray-300', 'w-1/3']) }}
                </div>
                <div>
                    @if ($errors->any())
                        {{ $errors->first('name') }}
                    @endif
                </div>
                <div class="mt-2">
                    {{ html()->label(__('layout.table_description'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{ html()->textarea('description', '')->addClass(['form-control rounded border-gray-300 w-1/3 h-32', 'cols' => '50', 'rows' => '10']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('description') }}
                @endif
                <div class="mt-2">
                    {{ html()->submit(__('layout.create_button'))->addClass(['bg-white hover:bg-grey text-white font-bold py-2 px-4 rounded']) }}
                </div>
            </div>
            {{ html()->form()->close() }}

        </div>
    @endauth

@endsection
