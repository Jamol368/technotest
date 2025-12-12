@extends('layouts.app')

@section('content')
<div class="site-wrap" id="home-section">
    <div class="owl-carousel-wrapper">
        <div class="box-92819">
            <h2 class="text-white mb-3"></h2>
        </div>
        <div class="owl-carousel owl-1">
            <div class="ftco-cover-1 overlay" style="background-image: url('{{ asset("app/images/1.png") }}');"></div>
            <div class="ftco-cover-1 overlay" style="background-image: url('{{ asset("app/images/2.png") }}');"></div>
        </div>
    </div>
</div>

<div class="site-section" id="test">
    <div class="container">
        <div class="row mb-5 align-items-st">
            <div class="col-md-12">
                <div class="heading-20219">
                    <h2 class="title text-capitalize text-center">Test turlari</h2>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($question_types as $key => $question_type)
            <div class="col-md-6">
                <div class="cause shadow-lg">

                    <a href="{{ route('subjects', ['question_type_id' => $question_type->id]) }}" class="cause-link d-block">
                        <img src="{{ asset('storage/' . $question_type->image) }}" alt="Image" class="img-fluid">
                        <div class="custom-progress-wrap">
                            <div class="custom-progress-inner">
                                <div class="custom-progress bg-success" style="width: 80%;"></div>
                            </div>
                        </div>
                    </a>

                    <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                        <span class="badge-warning py-1 small px-2 rounded mb-3 d-inline-block">{{ number_format($question_type->price, 0, '.', ' ') }} so'm</span>
                        <h3 class="mb-4"><a href="{{ route('subjects', ['question_type_id' => $question_type->id]) }}">{{ $question_type->name }}</a></h3>
                        <div class="border-top border-light border-bottom py-2">
                            <div class="ml-auto">Savollar soni: <strong class="text-primary">{{ $question_type->questions }} ta</strong></div>
                            <div class="ml-auto">Belgilangan vaqt: <strong class="text-primary">{{ $question_type->minutes }} daqiqa</strong></div>
                        </div>

                        <div class="py-4">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('subjects', ['question_type_id' => $question_type->id]) }}" class="btn btn-success">Tanlash</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-blue overlay site-section" style="background-image: url('{{ asset("app/images/hero_1.jpg") }}');">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-12">
                <div class="row mb-5">
                    <div class="col-md-7">
                        <div class="heading-20219">
                            <h2 class="title text-white mb-4">Nima uchun bizni tanlash kerak?</h2>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
                                ipsam repellendus voluptatum, totam magni iusto numquam quo eos dolor perferendis.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>1</span></div>
                            <div>
                                <h3>Odit Reiciendis</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit
                                    reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>2</span></div>
                            <div>
                                <h3>Nisi Sint Explicabo</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit
                                    reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>3</span></div>
                            <div>
                                <h3>Accusamus Labore Necessitatibus</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit
                                    reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="feature-29012 d-flex">
                            <div class="number mr-4"><span>4</span></div>
                            <div>
                                <h3>Consectetur Dolor Elit</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi id sint explicabo odit
                                    reiciendis eaque accusamus labore necessitatibus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="heading-20219 mb-5">
            <h2 class="title text-center">So'nggi yangiliklar</h2>
            <hr>
        </div>

        <div class="row">
            @foreach($announcements as $key => $announcement)
            <div class="col-md-6">
                <div class="event-29191 mb-5 pb-3 shadow-sm">
                    <a href="#" class="d-block mb-3">
                        <img src="{{ asset('storage/' . $announcement->image) }}" alt="Image" class="img-fluid rounded">
                    </a>
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
                            <h3><a href="single.html">{{ $announcement->title }}</a></h3>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
