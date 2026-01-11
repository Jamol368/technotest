@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">{{ trans('messages.textbooks') }}</h1>
                <p class="my-4"><a class="btn btn-success" href="{{ route('textbooks.create') }}">{{ trans('messages.create') }}</a></p>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('messages.user') }}</th>
                                    <th>{{ trans('messages.file') }}</th>
                                    <th>{{ trans('messages.title') }}</th>
                                    <th>{{ trans('messages.downloaded') }}</th>
                                    <th>{{ trans('messages.created_at') }}</th>
                                    <th>{{ trans('messages.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($textbooks as $textbook)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $textbook->user->name }}</td>
                                    <td><a href="{{ asset('storage/' . $textbook->file) }}" target="_blank">{{ trans('messages.file') }}</a></td>
                                    <td>{{ $textbook->title }}</td>
                                    <td>{{ $textbook->downloaded }}</td>
                                    <td>{{ $textbook->created_at }}</td>
                                    <td>
                                        <a href="{{ route('textbooks.edit', $textbook->id) }}" class="btn btn-sm btn-primary">
                                            {{ trans('messages.edit') }}
                                        </a>
                                        <form action="{{ route('textbooks.destroy', $textbook->id) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete this item?')">
                                                {{ trans('messages.delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $textbooks->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('admin.partials.footer')

    </div>
@endsection
