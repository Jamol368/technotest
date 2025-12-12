@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.subject') }}: {{ $subject->name }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">

                        <div class="border-t bg-gray-100 row p-4">
                            <a href="{{ route('subjects.edit', $subject) }}"
                               class="btn btn-warning text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.edit') }}
                            </a>

                            <form action="{{ route('subjects.destroy', $subject) }}" method="POST"
                                  class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this post?')"
                                        class="btn btn-danger text-white text-center rounded-lg mr-2 p-2 text-lg">
                                    {{ trans('messages.delete') }}
                                </button>
                            </form>

                            <a href="{{ route('subjects.index') }}"
                               class="btn btn-info text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.back') }}
                            </a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.name') }}:</th>
                                <td>{{ $subject->name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.color') }}:</th>
                                <td>{{ $subject->color }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.image') }}:</th>
                                <td>
                                    <img src="{{ asset('storage/' . $subject->image) }}" width="300" class="mt-2">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.is_active') }}:</th>
                                <td>{{ $subject->is_active?trans('messages.active'):trans('messages.not_active') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.description') }}:</th>
                                <td>{!! $subject->description  !!}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.created_at') }}:</th>
                                <td>{{ $subject->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
