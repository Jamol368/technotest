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
                        <form action="{{ route('users.update', $user->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">{{ trans('messages.name') }}:</th>
                                    <td>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.phone') }}:</th>
                                    <td>
                                        <input type="text" name="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               value="{{ old('phone', $user->phone) }}" required>
                                        @error('phone')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.balance') }}:</th>
                                    <td>
                                        <input type="text" name="balance"
                                               class="form-control @error('balance') is-invalid @enderror"
                                               value="{{ old('balance', $user->balance) }}">
                                        @error('balance')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.subject') }}:</th>
                                    <td>
                                        <select name="subject_id" id="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required>
                                            <option value="">{{ trans('messages.select') }}</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ old('subject_id', $user->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.qualification') }}:</th>
                                    <td>
                                        <select name="qualification_id" id="qualification_id" class="form-control @error('qualification_id') is-invalid @enderror" required>
                                            <option value="">{{ trans('messages.qualification') }}</option>
                                            @foreach($qualifications as $qualification)
                                                <option value="{{ $qualification->id }}" {{ old('qualification_id', $user->qualification_id ?? '') == $qualification->id ? 'selected' : '' }}>
                                                    {{ $qualification->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                            </table>

                            <button class="btn btn-warning">{{ trans('messages.save') }}</button>
                            <a href="{{ route('users.index') }}"
                               class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
