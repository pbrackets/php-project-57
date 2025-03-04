
@extends('layouts.app')
@section('content')

    @auth()
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl text-white">{{ __('layout.label_edit') }}</h1>

{{--            {{ Form::open(['url' => route('labels.update', $label), 'method' => 'PATCH', 'class' => 'w-50']) }}--}}
            {{  html()->form('PATCH', route('labels.update',$label))->addClass('w-50')->open() }}
            <div class="flex flex-col">
                <div>
                    {{ html()->label(__('layout.table_name'))->addClass(['text-white']) }}
                </div>
                <div class="mt-2">
                    {{ html()->text('name', $label->name)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3']) }}
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
                    {{ html()->textarea('description', $label->description)->addClass(['form-control', 'rounded', 'border-gray-300', 'w-1/3', 'h-32', 'cols' => '50', 'rows' => '10']) }}
                </div>
                @if ($errors->any())
                    {{ $errors->first('description') }}
                @endif
                <div>
                    {{ html()->submit(__('layout.update_button'))->addClass(['bg-white', ',hover:bg-blue-700', ',text-white', ',font-bold', 'py-2', 'px-4', 'rounded']) }}
                </div>
            </div>
            {{ html()->form()->close() }}

        </div>
    @endauth

@endsection

