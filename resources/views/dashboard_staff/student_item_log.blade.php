@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="text-center">{{ $user->full_name }}
                    <br>
                    <br>
                <h3>{{ $user->full_name  }}'s Response</h3>

                <hr>
                <div class="well container">
                    <table class="table table-striped">
                        <thead>
                        <th>Question</th>
                        <th>Answer</th>
                        </thead>
                        <tbody>
                        @foreach($clearance_logs as $clearance_log)
                            <tr>
                                <td>{{ $clearance_log->question->question }}:</td>
                                <td>{{ $clearance_log->answer }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="well container">

                    <h3>{{$role->title}} Items </h3>


                    <table class="table table-striped">

                        <thead>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($item_logs as $item_log)
                            <tr>
                                <td>{{ $item_log->item->label }}</td>
                                <td>{{ $item_log->description }}</td>
                                <td>
                                    @if ($item_log->is_fixed)
                                        <div class="bg-success" style="display: block;width: 16px;height: 16px;"></div>
                                    @else
                                        <div class="bg-danger" style="display: block;width: 16px;height: 16px;"></div>
                                    @endif
                                </td>
                                <td>

                                    <button class="btn btn-primary btn-sm"
                                            href="{{ route('fix_student_in_role_item_by_staff', ['student_id' => $user->id, 'role_id' => $role->id, 'item_log_id' => $item_log->id]) }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('fix_student_in_role_item_by_staff-form-{{$item_log->id}}').submit();">
                                        {{-- @if(!is_null(\App\StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('role_id', $role->id)->where('user_id', $key)->first()))
                                            disabled
                                            @endif--}}
                                        {{ __(' Returned') }}
                                    </button>

                                    <form id="fix_student_in_role_item_by_staff-form-{{ $item_log->id }}"
                                          action="{{ route('fix_student_in_role_item_by_staff', [
                                                'student_id' => $user->id,
                                                'role_id' => $role->id,
                                                'item_log_id' => $item_log->id
                                                ]) }}"
                                          method="POST"
                                          style="display: none;">
                                        @csrf
                                        <input type="hidden" value="{{ $user->id }}" name="student_id">
                                        <input type="hidden" value="{{ $role->id }}" name="role_id">
                                        <input type="hidden" value="{{ $item_log->id }}" name="item_log_id">
                                    </form>

                                    <br>
                                    <br>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <br>
    <br>
    <hr>

@endsection
