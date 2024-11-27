@extends('layouts.app')

@section('title', 'Answer')

@push('style')
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
                                                        <a href="{{ route('teacher.answer.show', ['id' => $exam->id, 'studentId' => $student->id]) }}"
                                                            class="btn"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('teacher.answer.print', ['id' => $exam->id, 'studentId' => $student->id]) }}"
                                                            class="btn"><i class="fas fa-download"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-star"
                                                            data-student-score="{{ $student->totalscore }}">
                                                            <i class="fas fa-star"></i>
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

    <div class="modal fade" id="starModal" tabindex="-1" role="dialog" aria-labelledby="starModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="starModalLabel">AI Score</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="highlight-student-score" class="p-3 my-3 bg-primary text-white font-weight-bold rounded"
                        style="font-size: 1.5rem;">
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/page/components-table.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.btn-star').on('click', function() {
                const studentScore = $(this).data('student-score');
                $('#highlight-student-score').text(studentScore);
                $('#starModal').modal('show');
            });
        });
    </script>
@endpush
