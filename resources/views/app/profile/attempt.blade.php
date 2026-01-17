@extends('layouts.test')

@section('content')
    <div class="flex flex-col flex-auto w-full">
        <div class="flex flex-col flex-auto">

            <div class="app-user-test">
                <div class="user-test-background">

                    <div class="test-page">

                        <div class="header header-container">

                            <div class="home">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('/app/images/logo.svg') }}" alt="logo" style="width: 212px">
                                </a>
                            </div>

                        </div>

                        <div class="main item">

                            <div class="h-full test-user-info">

                                <div class="user-info mb-2 ng-star-inserted">

                                    <div>

                                        <div class="teacher-name">
                                            {{ mb_strtoupper(auth()->user()->name) }}
                                        </div>

                                        <div class="flex mt-2">
                                            <div> <b>Test turi:</b> {{ $question_type->name }}</div>
                                        </div>
                                        <div class="flex mt-2">
                                            <div> <b>Fan:</b> {{ $subject->name }}</div>
                                        </div>
                                        <div class="flex mt-2">
                                            <div> <b>Ball:</b> {{ $question_type->point }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-test-block">
                                    <div class="mat-accordion mat-accordion-multi">

                                        <div
                                            class="mat-expansion-panel ng-tns-c128-28 mat-expanded mat-expansion-panel-spacing">

                                            <div
                                                class="mat-expansion-panel-header mat-focus-indicator ng-tns-c129-29 ng-tns-c128-28 mat-expanded mat-expansion-toggle-indicator-after ng-star-inserted"
                                                id="mat-expansion-panel-header-0" aria-disabled="true"
                                                style="height: 60px;">
                                                <span class="mat-content">
                                                    <div
                                                        class="mat-expansion-panel-header-title panel-title ng-tns-c129-29"> {{ $subject->name }} </div>
                                                </span>
                                            </div>
                                            <div
                                                class="mat-expansion-panel-content ng-tns-c128-28 ng-trigger ng-trigger-bodyExpansion"
                                                id="cdk-accordion-child-0">

                                                <div class="mat-expansion-panel-body">
                                                    <div class="container">
                                                        @for($i=0; $i<$question_type->getOriginal('questions');)
                                                            <div
                                                                class="nav-item tab-links nav-item-{{ $i + 1 }} {{ $i ? '' : 'active' }} {{ $user_attempt[$i]['is_correct']?'checked':'danger' }}"> {{ ++$i }}</div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="test">
                                @foreach($user_attempt as $key => $question)
                                    <div class="test-list test-list-{{ $key + 1 }} {{ $key ? 'hidden' : '' }}">
                                        <div class="question-wrapper">
                                            <div class="question-number"> Savol {{ $key + 1 }}</div>
                                        </div>
                                        <div class="mat-divider mat-divider-horizontal">
                                        </div>

                                        <div class="question-form-wrapper ng-star-inserted">
                                            <div class="question">
                                                <div class="selected-answer times-new-roman-14 ng-star-inserted">
                                                    {!! $question['question'] !!}
                                                    <p>{{ $question['explanation'] }}</p>
                                                </div>
                                            </div>

                                            <div class="answers">
                                                <div class="mat-radio-group ng-untouched ng-pristine ng-invalid">
                                                    @foreach($question['options'] as $answer_key => $answer)
                                                        <div class="mat-radio example-radio-button mat-accent"
                                                             id="mat-radio-{{ $answer_key }}">
                                                            <label class="mat-radio" for="mat-radio-{{ $answer_key }}-input">
                                                                <span class="mat-radio-container {{ $answer['is_selected']?'mat-radio-checked':'' }}">
                                                                    <span class="mat-radio-outer-circle"></span>
                                                                    <span class="mat-radio-inner-circle"></span>
                                                                    <span class="mat-ripple mat-radio-ripple mat-focus-indicator">
                                                                        <span class="mat-ripple-element mat-radio-persistent-ripple"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="mat-radio-label-content">
                                                                    <span style="font-size: 16px; font-weight: 700"><?= chr(64 + $loop->iteration) ?>)</span>
                                                                    <span class="selected-answer times-new-roman-14 ng-star-inserted">
                                                                        {{ $answer['answer'] }}
                                                                    </span>
                                                                    <?php if ($answer['is_selected'] && $answer['is_true']): ?>
                                                                        <i class="fas fa-check color-green font-size-18"></i>
                                                                    <?php elseif ($answer['is_selected'] && !$answer['is_true']): ?>
                                                                        <i class="fas fa-times color-red font-size-18"></i>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="test-list-pagination">
                                            <button class="prev" type="button"> Oldingi</button>
                                            <span class="test-number"> {{ $key + 1 }} / {{ count($user_attempt) }}</span>
                                            <button class="next" type="button"> Keyingi</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
