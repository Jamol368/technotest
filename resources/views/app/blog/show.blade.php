@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="row">
            <div class="col-md-8">
                {!! $announcement->text !!}
            </div>
                <div class="col-md-12">
                    <div class="event-29191 mb-5">
                        <div class="d-block mb-3">
                            <img src="{{ asset('storage/' . $announcement->image) }}" alt="Image" class="img-wrap w-100 rounded">
                        </div>
                        <div class="heading-20219 mt-3 mb-3">
                            <h2 class="title text-cursive">{{ $announcement->title }}</h2>
                        </div>

                        <div class="px-3 d-flex">
                            <div>
                                <div class="mb-3">
                                    <span class="mr-3"> <span class="icon-clock-o mr-2 text-muted"></span>{{ $announcement->created_at->format('Y-m-d H:i') }}</span>
                                    <span> <span class="icon-newspaper-o mr-2 text-muted"></span>{{ $announcement->read_count }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="content">
                            {!! $announcement->description !!}
                        </div>
                    </div>
                </div>

        </div>

    </div>
@endsection
