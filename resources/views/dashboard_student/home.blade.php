@extends('layouts.app')



@section('content')


    <div class="container" id="myWizard">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <h3>Clearance State</h3>

                <hr>
                <div class="well container">
                    <div class="row  justify-content-between">
                        <div class="col-md-5 p-3 mt-3 d-flex align-items-center justify-content-between bg-white border-dark border-1 ">

                            <div class="s-l">
                                <h5>Faculty</h5>
                                @if($faculty_is_approved)
                                    <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                @elseif($faculty_is_declined)
                                    <p class="paragraph-agileits-w3layouts text-danger">Declined</p>
                                        <p>You request has be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 1])}}"
                                               class="link">reasons</a></p>
                                @elseif($faculty_question_answers->count() == 0)
                                    <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                    @if($faculty_item_dirty_logs->count() > 0)
                                        <p>You might not be able to apply for faculty clearance now see
                                            <a href="{{route('show_student_reason', ['role_id' => 1])}}"
                                                    class="link">reasons</a></p>
                                    @endif
                                @else
                                    <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                        approval</p>
                                    @if($faculty_item_dirty_logs->count() > 0)
                                        <p>You request might be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 1])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @endif
                            </div>
                            <div class="s-r">
                                {{--<h6>340
                                    <i class="far fa-edit"></i>
                                </h6>--}}
                            </div>

                        </div>
                        <div class="col-md-5  p-3 mt-3 d-flex align-items-center justify-content-between bg-white ml-auto">
                            <div class="s-l">
                                <h5>Library</h5>
                                @if($library_is_approved)
                                    <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                @elseif($library_is_declined)
                                    <p class="paragraph-agileits-w3layouts text-danger">Declined</p>
                                    <p>You request has be declined due to few
                                        <a href="{{route('show_student_reason', ['role_id' => 2])}}"
                                           class="link">reasons</a></p>
                                @elseif($library_question_answers->count() == 0)
                                    <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                    @if($library_item_dirty_logs->count() > 0)
                                        <p>You might not be able to apply for faculty clearance now see
                                            <a href="{{route('show_student_reason', ['role_id' => 2])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @elseif(!is_null($library_question_answers))
                                    <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                        approval</p>
                                    @if($library_item_dirty_logs->count() > 0)
                                        <p>You request might be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 2])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @endif
                            </div>
                            <div class="s-r">
                                {{--<h6>340
                                    <i class="far fa-edit"></i>
                                </h6>--}}
                            </div>
                        </div>
                        <div class="w-100"></div>

                        <div class="col-md-5 p-3 mt-3 d-flex align-items-center justify-content-between bg-white  ">

                            <div class="s-l">
                                <h5>Sports</h5>

                                @if($sport_is_approved)
                                    <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                @elseif($sport_is_declined)
                                    <p class="paragraph-agileits-w3layouts text-danger">Declined</p>
                                    <p>You request has be declined due to few
                                        <a href="{{route('show_student_reason', ['role_id' => 3])}}"
                                           class="link">reasons</a></p>
                                @elseif($sport_question_answers->count() == 0)
                                    <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                    @if($sport_item_dirty_logs->count() > 0)
                                        <p>You might not be able to apply for faculty clearance now see
                                            <a href="{{route('show_student_reason', ['role_id' => 3])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @else
                                    <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                        approval</p>
                                    @if($sport_item_dirty_logs->count() > 0)
                                        <p>You request might be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 3])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @endif
                            </div>
                            <div class="s-r">
                                {{--<h6>340
                                    <i class="far fa-edit"></i>
                                </h6>--}}
                            </div>

                        </div>
                        <div class="col-md-5 p-3 mt-3 d-flex align-items-center justify-content-between bg-white ml-auto ">

                            <div class="s-l">
                                <h5>Health</h5>

                                @if($health_is_approved)
                                    <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                @elseif($health_is_declined)
                                    <p class="paragraph-agileits-w3layouts text-danger">Declined</p>
                                    <p>You request has be declined due to few
                                        <a href="{{route('show_student_reason', ['role_id' => 4])}}"
                                           class="link">reasons</a></p>
                                @elseif($health_question_answers->count() == 0)
                                    <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                    @if($health_item_dirty_logs->count() > 0)
                                        <p>You might not be able to apply for faculty clearance now see
                                            <a href="{{route('show_student_reason', ['role_id' => 4])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @else
                                    <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                        approval</p>
                                    @if($health_item_dirty_logs->count() > 0)
                                        <p>You request might be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 4])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @endif
                            </div>
                            <div class="s-r">
                                {{--<h6>340
                                    <i class="far fa-edit"></i>
                                </h6>--}}
                            </div>

                        </div>
                        <div class="col-md-5  p-3 mt-3 d-flex align-items-center justify-content-between bg-white ">
                            <div class="s-l">
                                <h5>Student Affairs</h5>
                                @if($student_affairs_is_approved)
                                    <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                @elseif($student_affairs_is_declined)
                                    <p class="paragraph-agileits-w3layouts text-danger">Declined</p>
                                    <p>You request has be declined due to few
                                        <a href="{{route('show_student_reason', ['role_id' => 5])}}"
                                           class="link">reasons</a></p>
                                @elseif($studentaffair_question_answers->count() == 0)
                                    <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                    @if($faculty_item_dirty_logs->count() > 0)
                                        <p>You might not be able to apply for faculty clearance now see
                                            <a href="{{route('show_student_reason', ['role_id' => 5])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @else
                                    <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                        approval</p>
                                    @if($studentaffairs_item_dirty_logs->count() > 0)
                                        <p>You request might be declined due to few
                                            <a href="{{route('show_student_reason', ['role_id' => 5])}}"
                                               class="link">reasons</a></p>
                                    @endif
                                @endif
                            </div>
                            <div class="s-r">
                                {{--<h6>340
                                    <i class="far fa-edit"></i>
                                </h6>--}}
                            </div>
                        </div>

                    </div>
                    <div class="justify-content-center">
                        {{--<div class="col-md-8 ">--}}
                        <div class="">
                            @if(!$faculty_is_approved or !$library_is_approved or !$sport_is_approved or !$health_is_approved or !$student_affairs_is_approved )
                                <h2>Check back later!</h2>
                                <p>Your clearance is currently been processed. Once completed you will have access to
                                    the print key for the acknowledgement slip.</p>
                            @else
                                <h2>Cleared</h2>
                                <p>Your acknowledgement slip is ready to be printed. click the button below to print
                                    it.</p>
                            @endif


                            @if($faculty_is_approved && $library_is_approved && $sport_is_approved && $health_is_approved && $student_affairs_is_approved )

                                <a href="{{ route('show_ack_slip', [
                                ]) }}" class="btn btn-primary btn-sm pull-left">
                                    Acknowledgement Slip</a>
                            @endif


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <br>
    <br>
    <hr>
    <div class="container" id="myWizard">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <h3>Clearance Wizard</h3>

                <hr>
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a href="#step2"
                                                    class="nav-link @if($next == 'faculty' or $next == null)active @endif"
                                                    data-toggle="tab"
                                                    data-step="2">Faculty </a></li>
                            <li class="nav-item"><a href="#step3" class="nav-link  @if($next == 'library')active @endif"
                                                    data-toggle="tab" data-step="3">Library</a>
                            </li>
                            <li class="nav-item"><a href="#step4" class="nav-link @if($next == 'sport')active @endif"
                                                    data-toggle="tab"
                                                    data-step="4">Sport</a>
                            </li>
                            <li class="nav-item"><a href="#step5" class="nav-link @if($next == 'health')active @endif"
                                                    data-toggle="tab" data-step="5">
                                    Health</a>
                            </li>
                            <li class="nav-item"><a href="#step6"
                                                    class="nav-link @if($next == 'student_affairs')active @endif"
                                                    data-toggle="tab" data-step="6">Student
                                    Affairs</a>
                            </li>
                            <li class="nav-item"><a href="#step7" class="nav-link" data-toggle="tab" data-step="7">Student
                                    Profile Photo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in show @if($next == 'faculty' or $next == null)active @endif" id="step2">

                        <div class="well">

                            <div class="card-body">
                                {{--@if($faculty_item_dirty_logs->count() > 0)
                                    <h3>You might not be able to apply for faculty clearance now see
                                        <a href="{{route('show_student_reason', ['role_id' => 1])}}"
                                           class="link">reasons</a></h3>
                                @else--}}
                                <form method="POST"
                                      action="{{ route('apply_faculty_clearance', ['next' => 'library']) }}">

                                    @foreach ($faculty_questions as $key => $question )

                                        @csrf

                                        <div class="form-group row">
                                            <label for="{{ $question->code_name }}"
                                                   class="col-md-4 col-form-label text-md-right">{{ $question->question }}</label>


                                            <div class="col-md-6">
                                        <textarea id="{{ $question->code_name }}"
                                                  class="form-control @error('$question->code_name ') is-invalid @enderror"
                                                  name="{{ $question->code_name }}" value=""
                                                  required
                                                  autocomplete="{{ $question->code_name }}"
                                                  autofocus>{{ $faculty_question_answers[$question->id] ?? '' }}</textarea>

                                                @error( $question->code_name )
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Apply') }}
                                            </button>
                                            {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                                        </div>
                                    </div>
                                </form>

                                {{--@endif--}}
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade in show @if($next == 'library')active @endif" id="step3">
                        <div class="well">

                            <div class="card-body">
                                {{--@if($library_item_dirty_logs->count() > 0)
                                    <h3>You might not be able to apply for library clearance now see
                                        <a href="{{route('show_student_reason', ['role_id' => 2])}}"
                                           class="link">reasons</a></h3>
                                @else--}}
                                <form method="POST"
                                      action="{{ route('apply_library_clearance', ['next' => 'sport']) }}">

                                    @foreach ($library_questions as $key => $question )

                                        @csrf

                                        <div class="form-group row">
                                            <label for="{{ $question->code_name }}"
                                                   class="col-md-4 col-form-label text-md-right">{{ $question->question }}</label>


                                            <div class="col-md-6">
                                        <textarea id="{{ $question->code_name }}"
                                                  class="form-control @error('$question->code_name ') is-invalid @enderror"
                                                  name="{{ $question->code_name }}" value=""
                                                  required
                                                  autocomplete="{{ $question->code_name }}"
                                                  autofocus>{{ $library_question_answers[$question->id] ?? '' }}</textarea>

                                                @error( $question->code_name )
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Apply') }}
                                            </button>
                                            {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                                        </div>
                                    </div>
                                </form>
                                {{--@endif--}}
                            </div>

                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'sport')active @endif" id="step4">
                        <div class="well">

                            <div class="card-body">
                               {{-- @if($sport_item_dirty_logs->count() > 0)
                                    <h3>You might not be able to apply for sport clearance now see
                                        <a href="{{route('show_student_reason', ['role_id' => 3])}}"
                                           class="link">reasons</a></h3>
                                @else--}}
                                <form method="POST" action="{{ route('apply_sport_clearance', ['next' => 'health']) }}">

                                    @foreach ($sport_questions as $key => $question )

                                        @csrf

                                        <div class="form-group row">
                                            <label for="{{ $question->code_name }}"
                                                   class="col-md-4 col-form-label text-md-right">{{ $question->question }}</label>


                                            <div class="col-md-6">
                                        <textarea id="{{ $question->code_name }}"
                                                  class="form-control @error('$question->code_name ') is-invalid @enderror"
                                                  name="{{ $question->code_name }}" value=""
                                                  required
                                                  autocomplete="{{ $question->code_name }}"
                                                  autofocus>{{ $sport_question_answers[$question->id] ?? '' }}</textarea>

                                                @error( $question->code_name )
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Apply') }}
                                            </button>
                                            {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                                        </div>
                                    </div>
                                </form>
                                {{--@endif--}}
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'health') active @endif" id="step5">
                        <div class="well">

                            <div class="card-body">
                                {{--@if($health_item_dirty_logs->count() > 0)
                                    <h3>You might not be able to apply for health clearance now see
                                        <a href="{{route('show_student_reason', ['role_id' => 4])}}"
                                           class="link">reasons</a></h3>
                                @else--}}
                                <form method="POST"
                                      action="{{ route('apply_health_clearance', ['next' => 'student_affairs']) }}">

                                    @foreach ($health_questions as $key => $question )

                                        @csrf

                                        <div class="form-group row">
                                            <label for="{{ $question->code_name }}"
                                                   class="col-md-4 col-form-label text-md-right">{{ $question->question }}</label>


                                            <div class="col-md-6">
                                        <textarea id="{{ $question->code_name }}"
                                                  class="form-control @error('$question->code_name ') is-invalid @enderror"
                                                  name="{{ $question->code_name }}" value=""
                                                  required
                                                  autocomplete="{{ $question->code_name }}"
                                                  autofocus>{{ $health_question_answers[$question->id] ?? '' }}</textarea>

                                                @error( $question->code_name )
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Apply') }}
                                            </button>
                                            {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                                        </div>
                                    </div>
                                </form>
                                {{--@endif--}}
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'student_affairs') active @endif" id="step6">
                        <div class="well">

                            <div class="card-body">
                                {{--@if($studentaffairs_item_dirty_logs->count() > 0)
                                    <h3>You might not be able to apply for student affairs clearance now see
                                        <a href="{{route('show_student_reason', ['role_id' => 5])}}"
                                           class="link">reasons</a></h3>
                                @else--}}
                                <form method="POST" action="{{ route('apply_studentaffairs_clearance') }}">

                                    @foreach ($studentaffairs_questions as $key => $question )

                                        @csrf

                                        <div class="form-group row">
                                            <label for="{{ $question->code_name }}"
                                                   class="col-md-4 col-form-label text-md-right">{{ $question->question }}</label>


                                            <div class="col-md-6">
                                        <textarea id="{{ $question->code_name }}"
                                                  class="form-control @error('$question->code_name ') is-invalid @enderror"
                                                  name="{{ $question->code_name }}" value=""
                                                  required
                                                  autocomplete="{{ $question->code_name }}"
                                                  autofocus>{{ $studentaffair_question_answers[$question->id] ?? '' }}</textarea>

                                                @error( $question->code_name )
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Apply') }}
                                            </button>
                                            {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                                        </div>
                                    </div>
                                </form>
                                {{--@endif--}}
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade" id="step7">
                        <div class="well">

                            <div class="card-body">

                                @if (is_null(Auth::user()->avatar))
                                    <form id="file-upload-form" class="uploader" action="{{route('update_avatar')}}"
                                          method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf
                                        <input id="file-upload" type="file"
                                               name="{{ \App\Utils\Constants::DBC_AVATAR }}" accept="image/*"
                                               onchange="readURL(this);">
                                        <label for="file-upload" id="file-drag">
                                            <img id="file-image" src="#" alt="Preview" class="hidden">
                                            <div id="start">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                <div>Select a file or drag here</div>
                                                <div id="notimage" class="hidden">Please select an image</div>
                                                <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                                <br>
                                                <span class="text-danger">{{ $errors->first( \App\Utils\Constants::DBC_AVATAR ) }}</span>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </label>
                                    </form>
                                @else
                                    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" width="120px"
                                         height="120px">
                                @endif
                                <br>
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
