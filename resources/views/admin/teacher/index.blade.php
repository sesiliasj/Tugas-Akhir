@extends('layouts.app')

@section('title', 'Teacher')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Teacher</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Admin</a></div>
                    <div class="breadcrumb-item"><a>Teacher</a></div>
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
                                            <th>Email</th>
                                            <th>Created At</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->created_at }}</td>
                                                {{-- <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('admin.teacher.delete', $teacher->id) }}"
                                                        class="btn btn-danger">Remove</a>
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
