@extends('layouts.report')



@section('content')

    <div class="container">
        <h1 class="text-center">{{ $settings->system_name }}</h1>
        <br>
        <h3 class="text-center">Acknowledgement Slip</h3>
        <br>
        <div class="card">
            <div class="card-header">
                <div>Academic Session
                <strong> {{ $settings->academic_session->title }}</strong></div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div>
                            <img src="{{  !is_null(Auth::user()->avatar) ? asset('storage/'.Auth::user()->avatar) : asset('img/default-avatar.png') }}" width="120px" height="120px">
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <h6 class="mb-3">Student Profile: </h6>
                        <div>
                            Name: <strong>{{ Auth::user()->full_name }}</strong>
                        </div>
                        <div>
                            REG CODE: <strong>{{ Auth::user()->reg_code }}</strong>
                        </div>
                        <div>
                            Email : <strong>{{ Auth::user()->email }}</strong>
                        </div>
                        <div>
                            Gender : <strong>{{ Auth::user()->gender }}</strong>
                        </div>
                    </div>



                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Staff</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach ($statuses as $key => $status )
                            <tr>
                                <th scope="row" class="text-center">
                                    {{--{{ $subject->id }} --}}
                                    {{ ++ $key }}
                                </th>
                                <td class="left">{{ $status->role->title }}</td>
                                <td class="right">{{ $status->staff->full_name ?? '-' }}</td>
                                <td class="right">{{ $status->is_cleared ? 'Cleared' : 'Pending' }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        {{--<table class="table table-clear">
                            <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Position</strong>
                                </td>
                                <td class="right">9th</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Recommendation </strong>
                                </td>
                                <td class="right">Good moral</td>
                            </tr>
                            </tbody>
                        </table>--}}

                    </div>

                </div>

            </div>
        </div>
    </div>




@endsection
