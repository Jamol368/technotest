@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.qualification') }}: {{ $qualification->name }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">

                        <div class="border-t bg-gray-100 d-flex p-4">
                            <a href="{{ route('qualifications.edit', $qualification) }}"
                               class="btn btn-warning text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.edit') }}
                            </a>

                            <form action="{{ route('qualifications.destroy', $qualification) }}" method="POST"
                                  class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this post?')"
                                        class="btn btn-danger text-white text-center rounded-lg mr-2 p-2 text-lg">
                                    {{ trans('messages.delete') }}
                                </button>
                            </form>

                            <a href="{{ route('qualifications.index') }}"
                               class="btn btn-info text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.back') }}
                            </a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.name') }}:</th>
                                <td>{{ $qualification->name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.image') }}:</th>
                                <td>
                                    <img src="{{ asset('storage/' . $qualification->image) }}" width="300" class="mt-2">
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.description') }}:</th>
                                <td>{!! $qualification->description  !!}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.created_at') }}:</th>
                                <td>{{ $qualification->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
