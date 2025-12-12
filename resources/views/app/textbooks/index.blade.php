@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="heading-20219 mb-5">
            <h2 class="title text-cursive">{{ trans('messages.textbooks') }}</h2>
        </div>

        <div class="row">
            @foreach($textbooks as $textbook)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $textbook->title }}</h5>
                            <p class="card-text text-muted">{{ trans('messages.downloaded_count') }}: {{ $textbook->downloaded }}</p>
                            <a href="{{ route('textbooks.download', ['id' => $textbook->id]) }}" download class="btn btn-primary btn-block">
                                {{ trans('messages.download') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 text-center">
                {{ $textbooks->links() }}
            </div>
        </div>


    </div>
@endsection
