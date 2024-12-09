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
                    <!-- Exam Details -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Exam Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Exam Name:</label>
                                            <p>{{ $exam->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Avg AI Score:</label>
                                            <p>{{ $totalscore }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Weight Score:</label>
                                            <p>{{ $totalweightscore }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Soal dan Jawaban -->
                    <div class="col-12">
                        @foreach ($examcontents as $index => $examcontent)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Question {{ $index + 1 }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            {!! $examcontent['content'] !!}
                                        </div>
                                    </div>

                                    @if (isset($answers[$index]))
                                        <div class="form-group row">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Answer</label>
                                            <div class="col-sm-12 col-md-7">
                                                {!! $answers[$index]['answer'] !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">AI
                                                Score</label>
                                            <div class="col-sm-12 col-md-7">
                                                <label>{{ $answers[$index]['score'] }}%</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Score
                                                Weight</label>
                                            <div class="col-sm-12 col-md-7">
                                                @if ($score[$index] != null)
                                                    <label>{{ $score[$index] }}</label>
                                                @else
                                                    <label>null</label>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            No answer available.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
