@extends('layouts.app')

@section('title', 'Create Exam')

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
                <h1>Exam</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('teacher.dashboard') }}">Teacher</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('teacher.exam.index') }}">Exam</a></div>
                    <div class="breadcrumb-item">Create</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('teacher.exam.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Exam
                                            Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="content-container">
                                                <div class="content-group">
                                                    <textarea class="summernote-simple" name="content[]"></textarea>
                                                    <button type="button" onclick="removeContent(this)"
                                                        class="btn btn-danger btn-sm mt-2">Hapus</button>
                                                </div>
                                            </div>
                                            <button type="button" onclick="addContent()"
                                                class="btn btn-success btn-sm mt-2">Tambah Isian</button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>
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
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script>
        function addContent() {
            const container = document.getElementById('content-container');
            const newContent = document.createElement('div');
            newContent.classList.add('content-group');
            newContent.innerHTML = `
                <textarea class="summernote-simple" name="content[]"></textarea>
                <button type="button" onclick="removeContent(this)" class="btn btn-danger btn-sm mt-2">Hapus</button>
            `;
            container.appendChild(newContent);

            // Initialize Summernote for new textarea
            $('.summernote-simple').summernote();
        }

        function removeContent(button) {
            const contentGroup = button.parentElement;
            contentGroup.remove();
        }

        // Initialize Summernote for the first content textarea
        $(document).ready(function() {
            $('.summernote-simple').summernote();
        });
    </script>
@endpush
