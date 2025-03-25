@extends('layouts.app')
@section('content')

    <div class="grid col-span-full">
        <h1 class="max-w-2xl mb-4 text-4xl leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
            {{ __('layout.labels_header') }} </h1>
        @auth()
            <div>
                @csrf
                <a href="{{ route('labels.create') }}" class="bg-white hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('layout.create_button_label') }}            </a>
            </div>
        @endauth
        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left text-white" style="text-align: left">
            <tr>
                <th>{{ __('layout.table_id') }}</th>
                <th>{{ __('layout.table_name') }}</th>
                <th>{{ __('layout.table_description') }}</th>
                <th>{{ __('layout.table_date_of_creation') }}</th>
                @auth()
                    <th>{{ __('layout.table_actions') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach($labels as $label)
                <tr class="border-b border-dashed text-white text-left">
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->name }}</td>
                    <td>{{ $label->description }}</td>
                    <td>{{ $label->created_at }}</td>
                    @auth()
                        <td>
                            <a
                                class="text-red-600 hover:text-red-900"
                                data-confirm="Are you sure?"
                                data-method="delete"

                                href="{{ route('labels.destroy', $label->id) }}"
                            >
                                {{ __('layout.table_delete') }}
                            </a>
                            <a class="text-blue-600 hover:text-blue-900"
                               href="{{ route("labels.edit", $label->id) }}"
                            >
                                {{ __('layout.table_edit') }}
                            </a>
                        </td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @auth()
        <div class="mt-4 grid col-span-full">{{ $labels->links() }}</div>
    @endauth
@endsection

