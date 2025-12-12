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
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
                    });
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
                        <form action="{{ route('questions.update', $question->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.question_types') }}:</th>
                                    <td>
                                        <select name="question_type_id" id="question_type_id" class="form-control @error('question_type_id') is-invalid @enderror" required>
                                            <option value="">{{ trans('messages.select') }}</option>
                                            @foreach($question_types as $question_type)
                                                <option value="{{ $question_type->id }}" {{ old('question_type_id', $question->question_type_id ?? '') == $question_type->id ? 'selected' : '' }}>
                                                    {{ $question_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.subject') }}:</th>
                                    <td>
                                        <select name="subject_id" id="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required>
                                            <option value="">{{ trans('messages.select') }}</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ old('subject_id', $question->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 150px">{{ trans('messages.topics') }}:</th>
                                    <td>
                                        <select name="topic_id" id="topic_id" class="form-control @error('topic_id') is-invalid @enderror">
                                            <option value="">{{ trans('messages.select') }}</option>
                                            @foreach($topics as $topic)
                                                <option value="{{ $topic->id }}" {{ old('topic_id', $question->topic_id ?? '') == $topic->id ? 'selected' : '' }}>
                                                    {{ $topic->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <script>
                                    document.getElementById('subject_id').addEventListener('change', function() {
                                        const subjectId = this.value;
                                        const topicSelect = document.getElementById('topic_id');

                                        if (!subjectId) {
                                            topicSelect.innerHTML = '<option value="">-- Oldin fanni tanlang --</option>';
                                            return;
                                        }

                                        fetch(`/admin/topics/by-subject/${subjectId}`)
                                            .then(response => response.json())
                                            .then(topics => {
                                                topicSelect.innerHTML = '<option value="">-- Tanlang --</option>';
                                                topics.forEach(topic => {
                                                    const option = document.createElement('option');
                                                    option.value = topic.id;
                                                    option.textContent = topic.name;
                                                    topicSelect.appendChild(option);
                                                });
                                            });
                                    });
                                </script>

                                <tr>
                                    <th>{{ trans('messages.question') }}:</th>
                                    <td>
                                        <textarea name="question" id="editor"
                                                  class="form-control @error('question') is-invalid @enderror"
                                                  rows="3">{!! $question->question !!}</textarea>
                                        @error('question')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.explanation') }}:</th>
                                    <td>
                                        <textarea name="explanation"
                                                  class="form-control @error('explanation') is-invalid @enderror"
                                                  rows="6">{!! $question->explanation !!}</textarea>
                                        @error('explanation')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ trans('messages.difficulty') }}:</th>
                                    <td>
                                        <input type="number" name="difficulty" class="form-control @error('explanation') is-invalid @enderror" />
                                        @error('explanation')
                                        <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                @for($i = 1; $i <= 4; $i++)
                                    <tr>
                                        <th>
                                            <strong>{{ chr(64 + $i) }}.</strong>
                                        </th>
                                        <td>
                                            <input type="text" name="options[{{ $i }}]" class="form-control"
                                                   value="{{ $options[$i-1]->answer }}" placeholder="{{ trans('messages.option') . ' ' . $i }}" required>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="correct_option" value="{{ $i }}" {{ $options[$i-1]->is_correct?'checked':'' }} class="form-check-input" required>
                                                <label class="form-check-label">{{ trans('messages.correct_answer') }}</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor

                            </table>

                            <button class="btn btn-warning">{{ trans('messages.save') }}</button>
                            <a href="{{ route('questions.index') }}"
                               class="btn btn-secondary">{{ trans('messages.cancel') }}</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection
