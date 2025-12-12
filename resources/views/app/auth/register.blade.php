@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h3 class="mt-5 mb-3 text-center">{{ trans('messages.register') }}</h3>

        <div class="row mb-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ trans('messages.register') }}</strong>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label class="form-label">Foydalanuvchi (FIO)</label>
                                <input type="text"
                                       name="name"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Telefon</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fan</label>
                                <select name="subject_id" class="form-control">
                                    <option value="">Fanni tanlang...</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">
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
                                        <option value="{{ $qualification->id }}">
                                            {{ $qualification->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Parol</label>
                                <input type="password"
                                       name="password"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Parolni tasdiqlang</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control">
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ trans('messages.register') }}
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
