@extends('layouts.app')

@section('title', 'Create Exam')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Default Input Text</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number (US Format)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password Strength</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Currency</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="text" class="form-control currency">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Purchase Code</label>
                                    <input type="text" class="form-control purchase-code"
                                        placeholder="ASDF-GHIJ-KLMN-OPQR">
                                </div>
                                <div class="form-group">
                                    <label>Invoice</label>
                                    <input type="text" class="form-control invoice-input">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="form-group">
                                    <label>Credit Card</label>
                                    <input type="text" class="form-control creditcard">
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control inputtags">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Toggle Switches</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="control-label">Toggle switches</div>
                                    <div class="custom-switches-stacked mt-2">
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="1" class="custom-switch-input"
                                                checked>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 1</span>
                                        </label>
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="2" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 2</span>
                                        </label>
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="3" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 3</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Toggle switch single</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">I agree with terms and conditions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Image Check</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Image Check</label>
                                    <div class="row gutters-sm">
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="1"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img01.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="2"
                                                    class="imagecheck-input" checked />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img02.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="3"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img03.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="4"
                                                    class="imagecheck-input" checked />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img04.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="5"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img05.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="6"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img06.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Color</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Simple</label>
                                    <input type="text" class="form-control colorpickerinput">
                                </div>
                                <div class="form-group">
                                    <label>Pick Your Color</label>
                                    <div class="input-group colorpickerinput">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-fill-drip"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Color Input</label>
                                    <div class="row gutters-xs">
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="primary"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-primary"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="secondary"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-secondary"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="danger"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-danger"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="warning"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-warning"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="info"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-info"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="success"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-success"></span>
                                            </label>
                                        </div>
                                    </div>
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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
