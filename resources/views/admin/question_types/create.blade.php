@extends('layouts.admin')

@section('title', 'Dashboard')

@push('scripts-ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('admin.upload.image') }}?_token={{ csrf_token() }}"
                },
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells', '|',
                    'imageUpload', 'link', '|',
                    'undo', 'redo'
                ]
            })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">
                <h1 class="text-4xl font-bold">{{ trans('messages.create') }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <form action="{{ route('question-types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.name') }}:</th>
                                    <td>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.questions') }}:</th>
                                    <td>
                                        <input type="text" name="questions"
                                               class="form-control @error('questions') is-invalid @enderror" required>
                                        @error('questions')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.minutes') }}:</th>
                                    <td>
                                        <input type="text" name="minutes"
                                               class="form-control @error('minutes') is-invalid @enderror" required>
                                        @error('minutes')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.point') }}:</th>
                                    <td>
                                        <input type="text" name="point"
                                               class="form-control @error('point') is-invalid @enderror" required>
                                        @error('point')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.price') }}:</th>
                                    <td>
                                        <input type="text" name="price"
                                               class="form-control @error('price') is-invalid @enderror" required>
                                        @error('price')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.image') }}:</th>
                                    <td>
                                        <input type="file" name="image"
                                               class="form-control @error('image') is-invalid @enderror" required>
                                        @error('image')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.description') }}:</th>
                                    <td>
                                        <textarea name="description" id="editor"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  rows="3"></textarea>
                                        @error('description')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-success">{{ trans('messages.save') }}</button>
                            <a href="{{ route('question-types.index') }}" class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
