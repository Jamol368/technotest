@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('admin.partials.navbar')

            <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">{{ trans('messages.user_attempts') }}</h1>

                <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-4 my-md-0 mw-100 navbar-search" action="{{ route('user-attempts.index') }}" method="get">
                    @csrf
                    <input type="text" class="form-control fz-11 mr-3" placeholder="{{ trans('messages.user') }}"
                           aria-label="Search" name="user" value="{{ request('user') }}" aria-describedby="basic-addon2">
                    <select name="question_type_id" class="form-control mr-3 input-w">
                        <option value="">{{ trans('messages.question_type') }}</option>
                        @foreach($question_types as $key => $question_type)
                            <option value="{{ $question_type->id }}"
                                {{ request('question_type_id') == $question_type->id ? 'selected' : '' }}>
                                {{ $question_type->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="subject_id" class="form-control mr-3 input-w">
                        <option value="">{{ trans('messages.subject') }}</option>
                        @foreach($subjects as $key => $subject)
                            <option value="{{ $subject->id }}"
                                {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control fz-11 mr-3 datepicker" placeholder="{{ trans('messages.date_from') }}"
                           aria-label="Search" name="created_at_from" value="{{ request('created_at_from') }}" aria-describedby="basic-addon2">
                    <input type="text" class="form-control fz-11 mr-3 datepicker" placeholder="{{ trans('messages.date_to') }}"
                           aria-label="Search" name="created_at_to" value="{{ request('created_at_to') }}" aria-describedby="basic-addon2">
                    <button class="btn btn-primary fz-11" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        flatpickr('.datepicker', {
                            dateFormat: "Y-m-d",
                            allowInput: true,
                            theme: "dark",
                        });
                    });
                </script>

                <div class="card shadow my-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('messages.user') }}</th>
                                    <th>{{ trans('messages.question_type') }}</th>
                                    <th>{{ trans('messages.subject') }}</th>
                                    <th>{{ trans('messages.topic') }}</th>
                                    <th>{{ trans('messages.score') }}</th>
                                    <th>{{ trans('messages.created_at') }}</th>
                                    <th>{{ trans('messages.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_attempts as $user_attempt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user_attempt->user->name }}</td>
                                    <td>{{ $user_attempt->questionType->name }}</td>
                                    <td>{{ $user_attempt->subject->name }}</td>
                                    <td>{{ $user_attempt->topic?->name }}</td>
                                    <td>{{ $user_attempt->score }}</td>
                                    <td>{{ $user_attempt->created_at }}</td>
                                    <td>
                                        <form action="{{ route('user-attempts.destroy', $user_attempt) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete this item?')">
                                                {{ trans('messages.delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $user_attempts->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @include('admin.partials.footer')

    </div>
@endsection
