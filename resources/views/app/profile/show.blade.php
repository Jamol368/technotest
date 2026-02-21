@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h3 class="mb-4">Mening Profilim</h3>

        <div class="row">
            <div class="col-md-4">

                <div class="card mb-4">
                    <div class="card-body">
                        <h5>Foydalanuvchi: {{ Auth::user()->name }}</h5>
                        <p class="text-muted mb-1">Telefon: <strong>{{ Auth::user()->phone }}</strong></p>
                        <p class="text-muted mb-1">Fan: <strong>{{ Auth::user()->subject->name }}</strong></p>
                        <p class="text-muted mb-1">Malaka toifa: {{ Auth::user()->qualification->name }}</p>
                        <p class="text-warning mb-1">Balans: {{ number_format(Auth::user()->balance, '0', '.', ' ') }}</p>
                    </div>
                </div>

            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <strong>Yangilash</strong>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Foydalanuvchi</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Telefon</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="{{ old('email', auth()->user()->phone) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fan</label>
                                <select name="subject_id" class="form-control">
                                    <option value="">Fanni tanlang...</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id', auth()->user()->subject_id) == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Malaka toifa</label>
                                <select name="qualification_id" class="form-control">
                                    <option value="">Malaka toifangizni tanlang...</option>
                                    @foreach($qualifications as $qualification)
                                        <option value="{{ $qualification->id }}"
                                            {{ old('qualification_id', auth()->user()->qualification_id) == $qualification->id ? 'selected' : '' }}>
                                            {{ $qualification->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                Saqlash
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
        <div class="profile-card mx-auto max-w-md p-6 bg-white shadow-lg rounded-3 mt-5 p-3">
            <h3 class="h3">Hisobni to'ldirish</h3>
            <img src="https://click.uz/click/images/logo.svg" alt="click.uz" class="m-4 p-3 click-logo">
            <form action="{{ route('profile.balance') }}" method="post">
                @csrf
                @method('POST')
                <div class="row g-3">
                    <div class="col-md-8">
                        <input type="number" name="amount" class="form-control border-0 bg-light px-4"
                               value="5000" style="height: 55px;" min="5000">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success bg-success w-100 py-3" type="submit">To'ldirish</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
