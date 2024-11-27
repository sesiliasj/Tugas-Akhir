@extends('layouts.app')

@section('title', 'Answer')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Answer</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('teacher.dashboard') }}">Teacher</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('teacher.answer.index') }}">Answer</a></div>
                    <div class="breadcrumb-item">{{ $exam->id }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Exam</label>
                                        <div class="col-sm-12 col-md-7">
                                            <label>{{ $exam->name }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Avg AI
                                            Score</label>
                                        <div class="col-sm-12 col-md-7">
                                            <label>{{ $totalscore }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Weight
                                            Score</label>
                                        <div class="col-sm-12 col-md-7">
                                            <label>{{ $totalweightscore }}</label>
                                        </div>
                                    </div>

                                    @foreach ($examcontents as $index => $examcontent)
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question
                                                {{ $index + 1 }}</label>
                                            <div class="col-sm-12 col-md-7">
                                                {!! $examcontent['content'] !!}
                                            </div>
                                        </div>

                                        @if (isset($answers[$index]))
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Answer
                                                    {{ $index + 1 }}</label>
                                                <div class="col-sm-12 col-md-7">
                                                    {!! $answers[$index]['answer'] !!}
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                    AI Score {{ $index + 1 }}
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    @if ($answers[$index]['score'] != null)
                                                        <label>{{ $answers[$index]['score'] }}%</label>
                                                    @else
                                                        <label>null</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                    Score Weight {{ $index + 1 }}
                                                </label>
                                                <div class="col-sm-12 col-md-7">
                                                    @if ($score[$index] != null)
                                                        <label>{{ $score[$index] }}</label>
                                                    @else
                                                        <label>null</label>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <div>No answer available.</div>
                                        @endif
                                    @endforeach

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
