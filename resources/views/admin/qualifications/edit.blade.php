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
                <h1 class="text-4xl font-bold">{{ trans('messages.edit') }}</h1>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <form action="{{ route('qualifications.update', $qualification->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.name') }}:</th>
                                    <td>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $qualification->name) }}" required>
                                        @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.image') }}:</th>
                                    <td>
                                        <input type="file" name="image"
                                               class="form-control @error('image') is-invalid @enderror">
                                        @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror

                                        @if (!empty($qualification->image))
                                            <img src="{{ asset('storage/' . $qualification->image) }}" width="120"
                                                 class="mt-2">
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.description') }}:</th>
                                    <td>
                                        <textarea name="description" id="editor"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  rows="3">
                                            {{ old('description', $qualification->description) }}</textarea>
                                        @error('description')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-warning">{{ trans('messages.save') }}</button>
                            <a href="{{ route('qualifications.index') }}"
                               class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
