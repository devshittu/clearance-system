@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-11">
                <h3 class="text-center">{{ $role->title }}</h3>

                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Names</th>
                        <th scope="col">Student Input</th>
                        <th scope="col">Clean Card</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($clearance_logs) > 0)
                        @foreach ($clearance_logs as $key => $clearance_log_by_user_ids )
                            <tr class="@if(isset($item_logs[$key])) alert-dark @endif">
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
                                    @if(isset($item_logs[$key]))
                                    <table>
                                        <thead>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        </thead>
                                        <tbody>
{{--                                        @if(count($item_logs[$key]) > 0 && !is_null($item_logs[$key]))--}}
                                        {{--@if($item_logs[$key])--}}
                                            @foreach($item_logs[$key] as $item_log)
                                                <tr>
                                                    <td>{{ $item_log->item->label }}:</td>
                                                    <td>{{ $item_log->description }}:</td>
                                                    <td>
                                                        @if ($item_log->is_fixed)
                                                            <div class="bg-success" style="display: block;width: 16px;height: 16px;"></div>
                                                            @else
                                                            <div class="bg-danger" style="display: block;width: 16px;height: 16px;"></div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <div>Clean card</div>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                       href="{{ route('clear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('clear_student_in_role_by_staff-form-{{$key}}').submit();"

                                    >
                                        {{-- @if(!is_null(\App\StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('role_id', $role->id)->where('user_id', $key)->first()))
                                            disabled
                                            @endif--}}
                                        {{ __(' Clear Student') }}
                                    </button>

                                    <form id="clear_student_in_role_by_staff-form-{{ $key }}" action="{{ route('clear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                        <input type="hidden" value="{{ $key }}" name="student_id">
                                        <input type="hidden" value="{{ $role->id }}" name="role_id">
                                    </form>

                                    <br>
                                    <br>
                                    <button class="btn btn-danger btn-sm"
                                            href="{{ route('clear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('unclear_student_in_role_by_staff-form-{{$key}}').submit();"

                                    >
                                        {{--@if(!is_null(\App\StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('role_id', $role->id)->where('user_id', $key)->first()))
                                            disabled
                                            @endif--}}
                                        {{ __(' Decline Clearance') }}
                                    </button>

                                    <form id="unclear_student_in_role_by_staff-form-{{ $key }}" action="{{ route('unclear_student_in_role_by_staff', ['student_id' => $key, 'role_id' => $role->id]) }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                        <input type="hidden" value="{{ $key }}" name="student_id">
                                        <input type="hidden" value="{{ $role->id }}" name="role_id">
                                    </form>
                                    <br>
                                    <br>
                                    <a class="btn btn-dark btn-sm"
                                            href="{{ route('show_student_locker', ['student_id' => $key, 'role_id' => $role->id]) }}">
                                        {{ __(' See Details') }}
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    @else

                        <tr>
                            <th scope="row" colspan="5">
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
