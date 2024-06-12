@extends('layouts.app')

@section('title', 'Exam')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Exam</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('teacher.dashboard') }}">Teacher</a></div>
                    <div class="breadcrumb-item"><a>Exam</a></div>
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
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>{{ $exam->created_at }}</td>
                                                <td>
                                                    @if ($exam->is_open)
                                                        <div class="badge badge-success">Open</div>
                                                    @else
                                                        <div class="badge badge-danger">Closed</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($exam->is_open)
                                                        <form action="{{ route('teacher.exam.close', $exam->id) }}"
                                                            method="POST">
                                                        @else
                                                            <form action="{{ route('teacher.exam.open', $exam->id) }}"
                                                                method="POST">
                                                    @endif
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Change Status</button>
                                                    <a href="{{ route('teacher.exam.edit', $exam->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('teacher.exam.delete', $exam->id) }}"
                                                        class="btn btn-danger">Remove</a>
                                                    </form>
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
