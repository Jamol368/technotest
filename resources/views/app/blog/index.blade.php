@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="heading-20219 mb-5">
            <h2 class="title text-cursive">{{ trans('messages.latest_news') }}</h2>
        </div>

        <div class="row">
            @foreach($announcements as $key => $announcement)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="event-29191 mb-5 pb-3 shadow-lg">
                    <a href="{{ route('blog.show', ['id' => $announcement->id]) }}" class="d-block mb-3"><img src="{{ asset('storage/' . $announcement->image) }}" alt="Image" class="img-fluid rounded"></a>
                    <div class="px-3 d-flex">

                        <div class="bg-primary p-3 d-inline-block text-center rounded mr-4 date">
                            <span class="text-white h3 m-0 d-block">{{ $announcement->created_at->format('d') }}</span>
                            <span class="text-white small">{{ $announcement->created_at->translatedFormat('M Y') }}</span>
                        </div>

                        <div>
                            <div class="mb-3">
                                <span class="mr-3"> <span class="icon-clock-o mr-2 text-muted"></span>{{ $announcement->created_at->format('H:i') }}</span>
                                <span> <span class="icon-newspaper-o mr-2 text-muted"></span>{{ $announcement->read_count }}</span>
                            </div>
                            <h3><a href="{{ route('blog.show', ['id' => $announcement->id]) }}">{{ $announcement->title }}</a></h3>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-12 text-center">
                {{ $announcements->links() }}
            </div>

        </div>

    </div>
@endsection
