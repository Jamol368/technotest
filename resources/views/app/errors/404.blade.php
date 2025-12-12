@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1>{{ $status??404 }}</h1>
        <p>{{ $message }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Asosiy sahifaga qaytish</a>
    </div>
@endsection
