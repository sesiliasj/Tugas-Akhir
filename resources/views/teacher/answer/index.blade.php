@extends('layouts.app')

@section('title', 'Answer')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Answer</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('teacher.dashboard') }}">Teacher</a></div>
                    <div class="breadcrumb-item"><a>Answer</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Student Name</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($answers as $answer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $answer->exam_id }}</td>
                                                <td>{{ $answer->student_id }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.answer.show', $answer->id) }}"
                                                        class="btn"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('teacher.answer.show', $answer->id) }}"
                                                        class="btn"><i class="fas fa-download"></i></a>
                                                    {{-- <a href="{{ route('teacher.exam.show', $exam->id) }}"
                                                        class="btn btn-secondary">Remove</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
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
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
