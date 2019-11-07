@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center">{{ $role->title }}</h3>

                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Names</th>
                        <th scope="col">Reg Code</th>
                        <th scope="col">Action</th>
                        {{--<th scope="col">Exam (70)</th>--}}
                        {{--<th scope="col">Total</th>--}}
                        {{--<th scope="col">Grade</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($clearance_logs) > 0)
                        @foreach ($clearance_logs as $key => $clearance_log_by_user_ids )
                            <tr>
                                <th scope="row">
                                    {{ $key }}
                                </th>
                                <td> {{ \App\User::whereId($key)->first()->full_name }} </td>
                                <td>
                                    {{--{{ $clearance_log_by_user_ids }}--}}
                                    <table>
                                        <thead>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        </thead>
                                        <tbody>
                                        @foreach($clearance_log_by_user_ids as $clearance_log_by_user_id)
                                            <tr>
                                                <td>{{ $clearance_log_by_user_id->question->question }}:</td>
                                                <td>{{ $clearance_log_by_user_id->answer }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </td>
                                <td>
                                    {{ 'AuthID: '.Auth::id() . ' UserId: '. $key }}
                                    <button class="btn btn-primary btn-sm"
                                       href="{{ route('clear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('clear_student_in_role_by_staff-form').submit();"
                                            @if(!is_null(\App\StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('role_id', $role->id)->where('user_id', $key)->first()))
                                            disabled
                                            @endif
                                    >
                                        {{ __(' Clear Student') }}
                                    </button>

                                    <form id="clear_student_in_role_by_staff-form" action="{{ route('clear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                        <input type="hidden" value="{{ $key }}" name="student_id">
                                        <input type="hidden" value="{{ $role->id }}" name="role_id">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else

                        <tr>
                            <th scope="row" colspan="4">
                                No student applied for {{ $role->title }} clearance.
                            </th>
                        </tr>
                    @endif

                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
