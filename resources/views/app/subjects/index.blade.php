@extends('layouts.app')

@section('content')
    <?php
//    $route = $question_type_id == 1?'topics.list':'questions.test';
    $route = 'questions.test';
    ?>
    <div class="container py-4">
        <div class="heading-20219 mb-5">
            <h2 class="title text-cursive">{{ trans('messages.subjects') }}</h2>
        </div>

        <div class="row">
            @foreach($subjects as $subject)
                @if($subject->is_active)
                    <div class="col-md-6 mb-3">
                        <label for="subject_{{ $subject->id }}" class="w-100">
                            <a href="{{ route($route, ['question_type' => $question_type_id, 'subject' => $subject->id]) }}">
                                <div class="card shadow-sm subject-card" style="border-left: 5px solid {{ $subject->color }}; background-color: {{ $subject->color }}">
                                    <img src="{{ asset('storage/' . $subject->image) }}" class="card-img-top img-fluid" alt="{{ $subject->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title color-white">{{ $subject->name }}</h5>
                                        <p class="card-text text-muted">{!! $subject->description !!}</p>
                                    </div>
                                </div>
                            </a>
                        </label>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
