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
                        <form action="{{ route('subjects.update', $subject->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.name') }}:</th>
                                    <td>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $subject->name) }}" required>
                                        @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.color') }}:</th>
                                    <td>
                                        <input type="color" name="color"
                                               class="form-control @error('color') is-invalid @enderror"
                                               value="{{ old('color', $subject->color) }}" required>
                                        @error('color')
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

                                        @if (!empty($subject->image))
                                            <img src="{{ asset('storage/' . $subject->image) }}" width="120"
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
                                            {{ old('description', $subject->description) }}</textarea>
                                        @error('description')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.is_active') }}:</th>
                                    <td>
                                        <input type="checkbox" name="is_active" value="1" {{ $subject->is_active?'checked':'' }}
                                               class="@error('is_active') is-invalid @enderror" />
                                        @error('is_active')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-warning">{{ trans('messages.save') }}</button>
                            <a href="{{ route('subjects.index') }}"
                               class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
