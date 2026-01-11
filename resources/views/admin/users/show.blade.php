@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.user') }}: {{ $user->name }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">

                        <div class="border-t bg-gray-100 d-flex p-4">
                            <a href="{{ route('users.edit', $user) }}"
                               class="btn btn-warning text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.edit') }}
                            </a>

                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                  class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this post?')"
                                        class="btn btn-danger text-white text-center rounded-lg mr-2 p-2 text-lg">
                                    {{ trans('messages.delete') }}
                                </button>
                            </form>

                            <a href="{{ route('users.index') }}"
                               class="btn btn-info text-white text-center rounded-lg mr-2 p-2 text-lg">
                                {{ trans('messages.back') }}
                            </a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 150px; text-align: left;">{{ trans('messages.name') }}:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.phone') }}:</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.balance') }}:</th>
                                <td>{{ $user->balance }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.subject') }}:</th>
                                <td>{{ $user->subject->name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.qualification') }}:</th>
                                <td>{{ $user->qualification->name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.password') }}:</th>
                                <td>{{ $user->hash }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">{{ trans('messages.created_at') }}:</th>
                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
