@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h3 class="mb-4">Mening Urinishlarim</h3>

        <div class="row">
            <div class="col-md-12">

                <div class="mb-12">
                    <table class="table table-bordered table-striped mt-5 w-100">
                        <thead>
                        <tr>
                            <th>Test turi</th>
                            <th>Fan</th>
                            <th>To'g'ri javoblar</th>
                            <th>Ball</th>
                            <th>Tugallangan vaqti</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_attempts as $user_attempt)
                            <tr>
                                <td>{{$user_attempt->questionType->name}}</td>
                                <td>{{$user_attempt->subject->name}}</td>
                                <td>{{$user_attempt->correct_count}}</td>
                                <td>{{$user_attempt->score}}</td>
                                <td>{{$user_attempt->finished_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
