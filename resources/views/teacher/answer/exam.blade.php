@extends('layouts.app')

@section('title', 'Answer')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Answer of {{ $exam->name }}</h1>
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
                                            <th>Student</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    @if ($student->answer->count() > 0)
                                                        <div class="badge badge-success">Collected</div>
                                                    @else
                                                        <div class="badge badge-danger">Not Yet</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($student->answer->count() > 0)
                                                        <a href="{{ route('teacher.answer.show', $exam->id) }}"
                                                            class="btn"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('teacher.answer.show', $exam->id) }}"
                                                            class="btn"><i class="fas fa-download"></i>
                                                        </a>
                                                    @endif
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
