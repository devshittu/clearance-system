@extends('layouts.app')



@section('content')

    {{-- <div class="container">
         @if (!Auth::user()->student_profile->has_transit)
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header alert-info">Notification</div>

                         <div class="card-body">
                             Your term has been migrated, to update your profile click the Migrate button below to set up your profile for the next term.
                         </div>
                         <div class="card-footer">

                             <form id="accept-terminal-migration-form" action="{{ route('accept_terminal_migration') }}" method="POST"
                                   style="display: none;">
                                 @csrf
                             </form>
                             <button type="button" class="btn btn-success"
                                     onclick="event.preventDefault();
                                         document.getElementById('accept-terminal-migration-form' ).submit();">
                                 Migrate</button>
                         </div>
                     </div>
                 </div>
             </div>
             <br>
         @endif
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" id="subjects-tab" data-toggle="tab" href="#subjects" role="tab"
                            aria-controls="subjects" aria-selected="true">Subjects</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profile</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="books-tab" data-toggle="tab" href="#books" role="tab"
                            aria-controls="books" aria-selected="false">Recommended Books</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="calender-tab" data-toggle="tab" href="#calender" role="tab"
                            aria-controls="calender" aria-selected="false">School Calender</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="results-tab" data-toggle="tab" href="#results" role="tab"
                            aria-controls="results" aria-selected="true">Results</a>
                     </li>
                 </ul>
                 <div class="tab-content" id="myTabContent">

                     <div class="tab-pane fade show active" id="subjects" role="tabpanel" aria-labelledby="subjects-tab">

                         <br>
                         <table class="table table-striped">
                             <thead>
                             <tr>
                                 <th scope="col" class="text-center">#</th>
                                 <th scope="col">Title</th>
                                 <th scope="col">Category</th>
                             </tr>
                             </thead>
                             <tbody>

                            --}}{{-- @foreach ($subjects as $key => $subject )
                                 <tr>
                                     <th scope="row">
                                         --}}{{----}}{{--{{ $subject->id }} --}}{{----}}{{--
                                         {{ $key + 1 }}
                                     </th>
                                     <td>{{ $subject->academic_subject->title }}</td>
                                     <td>{{ $subject->academic_subject->category ?? '-' }}</td>
                                 </tr>
                             @endforeach--}}{{--
                             </tbody>
                         </table>

                         <div class="row justify-content-end">
                             <div class="col-md-6  justify-content-end">
                                 <a href="{{ route('show_student_result') }}" class="btn btn-primary pull-left">
                                     Show Detailed Result</a>
                             </div>
                             <div class="col-md-6">
                                 <a href="{{ route('show_student_result_past') }}" class="btn btn-dark pull-right">
                                     Show Old Reports</a>
                             </div>
                         </div>
                         <br>
                     </div>
                     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         --}}{{--Profile Tab...--}}{{--
                         <br>

                         @if (is_null(Auth::user()->avatar))
                             <form id="file-upload-form" class="uploader" action="{{route('update_avatar')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                 @csrf
                                 <input id="file-upload" type="file" name="{{ \App\Utils\Constants::DBC_AVATAR }}" accept="image/*" onchange="readURL(this);">
                                 <label for="file-upload" id="file-drag">
                                     <img id="file-image" src="#" alt="Preview" class="hidden">
                                     <div id="start" >
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
                             <img src="{{ asset('storage/'.Auth::user()->avatar) }}" width="120px" height="120px">
                         @endif
                         <br>

                         <table class="table table-striped">
                             <thead>
                             <tr>
                                 <th scope="col" colspan="2" class="text-center">Personal Details</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <th scope="row">REG NO</th>
                                 <td>{{ Auth::user()->reg_code ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th scope="row">Email</th>
                                 <td>{{ Auth::user()->email ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th scope="row">Full Name</th>
                                 <td>{{ (Auth::user()->first_name . ' ' . Auth::user()->last_name) ??  ('Unknown User') }}</td>
                             </tr>
                             <tr>
                                 <th scope="row">Gender</th>
                                 <td>{{ Auth::user()->gender ?? ''}}</td>
                             </tr>
                             <tr>
                                 <th scope="row">User Type</th>
                                 <td>{{ Auth::user()->type ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th scope="row">Date of Birth</th>
                                 <td>{{ Auth::user()->date_of_birth ?? '' }}</td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                         <br>
                         <table class="table table-striped">
                             <thead>
                             <tr>
                                 <th scope="col" class="text-center">Title</th>
                                 <th scope="col">ISBN</th>
                                 <th scope="col">Publication date</th>
                                 <th scope="col">Price</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <th scope="row">MacMillian English</th>
                                 <td>28-Dec-2019</td>
                                 <td>28-122019</td>
                                 <td>#1900</td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="tab-pane fade" id="calender" role="tabpanel" aria-labelledby="calender-tab">
                         <br>
                         <table class="table table-striped">
                             <thead>
                             <tr>
                                 <th scope="col" class="text-center">Event Title</th>
                                 <th scope="col" class="text-right">Publication date</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <th scope="row">Inter-House Sports</th>
                                 <td class="text-right">28-12-2019</td>
                             </tr>
                             <tr>
                                 <th scope="row">Continous Assesment Tests (C.A)</th>
                                 <td class="text-right">13-1-2020</td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="tab-pane fade" id="results" role="tabpanel" aria-labelledby="results-tab">

                         <br>
                         <table class="table table-striped">
                             <thead>
                             <tr>
                                 <th scope="col" class="text-center">#</th>
                                 <th scope="col">Title</th>
                                 <th scope="col">C.A. Test (30)</th>
                                 <th scope="col">Exam (70)</th>
                                 --}}{{--<th scope="col">Total</th>--}}{{--
                                 --}}{{--<th scope="col">Grade</th>--}}{{--
                             </tr>
                             </thead>
                             <tbody>

                             --}}{{--@foreach ($subjects as $key => $subject )
                                 @if (!is_null($subject->ca_test_score))
                                 <tr>
                                     <th scope="row">
                                         --}}{{----}}{{--{{ $subject->id }} --}}{{----}}{{--
                                         {{ $key + 1 }}
                                     </th>
                                     <td>{{ $subject->academic_subject->title }}</td>
                                     <td>{{ $subject->ca_test_score ?? '-' }}</td>
                                     <td>{{ $subject->ca_exam_score ?? '-' }}</td>
                                     --}}{{----}}{{--<td>{{ $subject->ca_total ?? '-' }}</td>--}}{{----}}{{--
                                     --}}{{----}}{{--<td>{{ score_grade($subject->ca_total) }}</td>--}}{{----}}{{--
                                 </tr>
                                 @endif
                             @endforeach--}}{{--
                             </tbody>
                         </table>

                         <div class="row justify-content-end">
                             <div class="col-md-6  justify-content-end">
                                 <a href="{{ route('show_student_result') }}" class="btn btn-primary pull-left">
                                     Show Detailed Result</a>
                             </div>
                             <div class="col-md-6">
                                 <a href="{{ route('show_student_result_past') }}" class="btn btn-dark pull-right">
                                     Show Old Reports</a>
                             </div>
                         </div>
                         <br>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="row justify-content-center">
             <section>
                 <div class="wizard">
                     <div class="wizard-inner">
                         <div class="connecting-line"></div>
                         <ul class="nav nav-tabs" role="tablist">

                             <li role="presentation" class="active">
                                 <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                             <span class="round-tab">
                                 <i class="glyphicon glyphicon-folder-open"></i>
                             </span>
                                 </a>
                             </li>

                             <li role="presentation" class="disabled">
                                 <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                             <span class="round-tab">
                                 <i class="glyphicon glyphicon-pencil"></i>
                             </span>
                                 </a>
                             </li>
                             <li role="presentation" class="disabled">
                                 <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                             <span class="round-tab">
                                 <i class="glyphicon glyphicon-picture"></i>
                             </span>
                                 </a>
                             </li>

                             <li role="presentation" class="disabled">
                                 <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                             <span class="round-tab">
                                 <i class="glyphicon glyphicon-ok"></i>
                             </span>
                                 </a>
                             </li>
                         </ul>
                     </div>

                     <form role="form">
                         <div class="tab-content">
                             <div class="tab-pane active" role="tabpanel" id="step1">
                                 <h3>Step 1</h3>
                                 <p>This is step 1</p>
                                 <ul class="list-inline pull-right">
                                     <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                 </ul>
                             </div>
                             <div class="tab-pane" role="tabpanel" id="step2">
                                 <h3>Step 2</h3>
                                 <p>This is step 2</p>
                                 <ul class="list-inline pull-right">
                                     <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                     <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                 </ul>
                             </div>
                             <div class="tab-pane" role="tabpanel" id="step3">
                                 <h3>Step 3</h3>
                                 <p>This is step 3</p>
                                 <ul class="list-inline pull-right">
                                     <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                     <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                     <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                 </ul>
                             </div>
                             <div class="tab-pane" role="tabpanel" id="complete">
                                 <h3>Complete</h3>
                                 <p>You have successfully completed all steps.</p>
                             </div>
                             <div class="clearfix"></div>
                         </div>
                     </form>
                 </div>
             </section>
         </div>
     </div>--}}

    <div class="container" id="myWizard">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <h3>Clearance Wizard</h3>

                <hr>

                {{--<div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1"
                         aria-valuemin="1"
                         aria-valuemax="5" style="width: 20%;">
                        Step 1 of 5
                    </div>
                </div>
--}}
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a href="#step1" class="nav-link" data-toggle="tab" data-step="1">Status
                                </a>
                            </li>
                            <li class="nav-item"><a href="#step2" class="nav-link @if($next == 'faculty' or $next == null)active @endif" data-toggle="tab"
                                                    data-step="2">Faculty </a></li>
                            <li class="nav-item"><a href="#step3" class="nav-link  @if($next == 'library')active @endif" data-toggle="tab" data-step="3">Library</a>
                            </li>
                            <li class="nav-item"><a href="#step4" class="nav-link @if($next == 'sport')active @endif" data-toggle="tab"
                                                    data-step="4">Sport</a>
                            </li>
                            <li class="nav-item"><a href="#step5" class="nav-link @if($next == 'student_affairs')active @endif" data-toggle="tab" data-step="5">Student
                                    Affairs</a>
                            </li>
                            <li class="nav-item"><a href="#step6" class="nav-link" data-toggle="tab" data-step="6">Student
                                    Profile Photo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade" id="step1">
                        <div class="well container">
                            <div class="row  justify-content-between">
                                <div class="col-md-5 p-3 mt-3 d-flex align-items-center justify-content-between bg-white border-dark border-1 ">

                                    <div class="s-l">
                                        <h5>Faculty</h5>
                                        @if($faculty_is_approved)
                                            <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                        @elseif($faculty_question_answers->count() == 0)
                                            <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                        @else
                                            <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                                approval</p>
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
                                        @elseif($library_question_answers->count() == 0)
                                            <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                        @elseif(!is_null($library_question_answers))
                                            <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                                approval</p>
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
                                        @elseif($sport_question_answers->count() == 0)
                                            <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                        @else
                                            <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                                approval</p>
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
                                        <h5>Student Affairs</h5>
                                        @if($student_affairs_is_approved)
                                            <p class="paragraph-agileits-w3layouts text-success">Cleared</p>
                                        @elseif($studentaffair_question_answers->count() == 0)
                                            <p class="paragraph-agileits-w3layouts text-danger">You have not applied</p>
                                        @else
                                            <p class="paragraph-agileits-w3layouts text-info">Submitted, pending
                                                approval</p>
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
                                    @if(!$faculty_is_approved or !$library_is_approved or !$sport_is_approved or !$student_affairs_is_approved )
                                    <h2>Check back later!</h2>
                                    <p>Your clearance is currently been processed. Once completed you will have access to
                                        the print key for the acknowledgement slip.</p>
                                    @else
                                        <h2>Cleared</h2>
                                        <p>Your acknowledgement slip is ready to be printed. click the button below to print it.</p>
                                    @endif


                                    @if($faculty_is_approved && $library_is_approved && $sport_is_approved && $student_affairs_is_approved )

                                        <a href="{{ route('show_ack_slip', [
                                ]) }}" class="btn btn-primary btn-sm pull-left">
                                            Acknowledgement Slip</a>
                                    @endif


                                </div>
                            </div>
                        </div>
                        {{--<a class="btn btn-success first" href="#">Start over</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'faculty' or $next == null)active @endif" id="step2">

                        <div class="well">

                            <div class="card-body">
                                <form method="POST" action="{{ route('apply_faculty_clearance', ['next' => 'library']) }}">

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
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade in show @if($next == 'library')active @endif" id="step3">
                        <div class="well">

                            <div class="card-body">
                                <form method="POST" action="{{ route('apply_library_clearance', ['next' => 'sport']) }}">

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
                            </div>

                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'sport')active @endif" id="step4">
                        <div class="well">

                            <div class="card-body">
                                <form method="POST" action="{{ route('apply_sport_clearance', ['next' => 'student_affairs']) }}">

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
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade in show @if($next == 'student_affairs') active @endif" id="step5">
                        <div class="well">

                            <div class="card-body">
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
                            </div>
                        </div>
                        {{--<a class="btn btn-default next" href="#">Continue</a>--}}
                    </div>
                    <div class="tab-pane fade" id="step6">
                        <div class="well">

                            <div class="card-body">

                                @if (is_null(Auth::user()->avatar))
                                    <form id="file-upload-form" class="uploader" action="{{route('update_avatar')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf
                                        <input id="file-upload" type="file" name="{{ \App\Utils\Constants::DBC_AVATAR }}" accept="image/*" onchange="readURL(this);">
                                        <label for="file-upload" id="file-drag">
                                            <img id="file-image" src="#" alt="Preview" class="hidden">
                                            <div id="start" >
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
                                    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" width="120px" height="120px">
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
