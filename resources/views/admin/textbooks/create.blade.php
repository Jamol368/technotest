@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.create') }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <form action="{{ route('textbooks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.file') }}:</th>
                                    <td>
                                        <input type="file" name="file"
                                               class="form-control @error('file') is-invalid @enderror" required>
                                        @error('file')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.title') }}:</th>
                                    <td>
                                        <textarea name="title"
                                                  class="form-control @error('title') is-invalid @enderror"
                                                  rows="3"></textarea>
                                        @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-success">{{ trans('messages.save') }}</button>
                            <a href="{{ route('textbooks.index') }}" class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
