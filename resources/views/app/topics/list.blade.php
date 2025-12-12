@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="heading-20219 mb-5">
            <h2 class="title text-cursive">{{ trans('messages.topics') }}</h2>
            <h4 class="text-cursive">{{ trans('messages.subject') }}: {{ $subject->name }}</h4>
        </div>

        <div class="row">
            @foreach($topics as $topic)
                <div class="col-md-12 mb-3">
                        <a href="{{ route('questions.test', ['question_type' => $question_type_id, 'subject' => $subject->id, 'topic' => $topic->id]) }}">
                            <div class="card shadow-sm subject-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $topic->name }}</h5>
                                </div>
                            </div>
                        </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
