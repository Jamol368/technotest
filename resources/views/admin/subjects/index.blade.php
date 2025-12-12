@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">{{ trans('messages.subjects') }}</h1>
                <p class="my-4"><a class="btn btn-success" href="{{ route('subjects.create') }}">{{ trans('messages.create') }}</a></p>

                <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-4 my-md-0 mw-100 navbar-search" action="{{ route('subjects.index') }}" method="get">
                    @csrf
                    <input type="text" class="form-control fz-11 mr-3" placeholder="{{ trans('messages.name') }}"
                           aria-label="Search" name="name" value="{{ request('name') }}" aria-describedby="basic-addon2">
                    <input type="text" class="form-control fz-11 mr-3 datepicker" placeholder="{{ trans('messages.date_from') }}"
                           aria-label="Search" name="created_at_from" value="{{ request('created_at_from') }}" aria-describedby="basic-addon2">
                    <input type="text" class="form-control fz-11 mr-3 datepicker" placeholder="{{ trans('messages.date_to') }}"
                           aria-label="Search" name="created_at_to" value="{{ request('created_at_to') }}" aria-describedby="basic-addon2">
                    <button class="btn btn-primary fz-11" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        flatpickr('.datepicker', {
                            dateFormat: "Y-m-d",
                            allowInput: true,
                            theme: "dark",
                        });
                    });
                </script>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('messages.name') }}</th>
                                    <th>{{ trans('messages.color') }}</th>
                                    <th>{{ trans('messages.created_at') }}</th>
                                    <th>{{ trans('messages.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>
                                        <span style="display:inline-block;width:20px;height:20px;background-color:{{ $subject->color }}"></span>
                                        {{ $subject->color }}
                                    </td>
                                    <td>{{ $subject->created_at }}</td>
                                    <td>
                                        <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-sm btn-info">
                                            {{ trans('messages.show') }}
                                        </a>
                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-primary">
                                            {{ trans('messages.edit') }}
                                        </a>
                                        <form action="{{ route('subjects.destroy', $subject->id) }}"
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
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('admin.partials.footer')

    </div>
@endsection
