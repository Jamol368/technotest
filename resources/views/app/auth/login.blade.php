@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h3 class="mt-5 mb-3 text-center">Tizimga kirish</h3>

        <div class="row mb-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>Kirish</strong>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="mb-3">
                                <label class="form-label">Telefon</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Parol</label>
                                <input type="password"
                                       name="password"
                                       class="form-control">
                            </div>

                            <button class="btn btn-primary" type="submit">
                                Kirish
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
