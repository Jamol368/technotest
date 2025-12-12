@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.edit') }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <form action="{{ route('textbooks.update', $textbook->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.title') }}:</th>
                                    <td>
                                        <input type="text" name="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $textbook->title) }}" required>
                                        @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.file') }}:</th>
                                    <td>
                                        <input type="file" name="file"
                                               class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror

                                        @if (!empty($textbook->file))
                                            <a href="{{ asset('storage/' . $textbook->file) }}" target="_blank"
                                               class="mt-2">{{ trans('messages.file') }}</a>
                                        @endif
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-warning">{{ trans('messages.save') }}</button>
                            <a href="{{ route('textbooks.index') }}"
                               class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
