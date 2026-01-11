@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">{{ trans('messages.announcements') }}</h1>
                <p class="my-4"><a class="btn btn-success" href="{{ route('announcements.create') }}">{{ trans('messages.create') }}</a></p>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('messages.user') }}</th>
                                    <th>{{ trans('messages.title') }}</th>
                                    <th>{{ trans('messages.created_at') }}</th>
                                    <th>{{ trans('messages.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($announcements as $announcement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $announcement->user->name }}</td>
                                    <td>{{ $announcement->title }}</td>
                                    <td>{{ $announcement->created_at }}</td>
                                    <td>
                                        <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-sm btn-info">
                                            {{ trans('messages.show') }}
                                        </a>
                                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-primary">
                                            {{ trans('messages.edit') }}
                                        </a>
                                        <form action="{{ route('announcements.destroy', $announcement->id) }}"
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
                            {{ $announcements->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('admin.partials.footer')

    </div>
@endsection
