@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                {{--<div class="market-updates">
                    <div class="col-md-6 market-update-gd">
                        <div class="market-update-block clr-block-2">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Students</h4>
                                <h3>13,500</h3>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-6 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Classes</h4>
                                <h3>1</h3>
                                --}}{{--<p>Other hand, we denounce</p>--}}{{--
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    --}}{{--<div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-3">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-usd"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Sales</h4>
                                <h3>1,500</h3>
                                <p>Other hand, we denounce</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-4">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Orders</h4>
                                <h3>1,500</h3>
                                <p>Other hand, we denounce</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>--}}{{--
                    <div class="clearfix"> </div>
                </div>--}}

                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Session</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($roles as $key => $role )
                        <tr>
                            <th scope="row">
                                {{ ++$key }}
                            </th>
                            <td>{{ $role->role->title }}</td>
                            <td>{{ $role->role->code_name ?? '-' }}</td>
                            <td>{{ $role->academic_session->code_name ?? '-' }}</td>
                            <td><a href="{{ route('show_class', [
                            \App\Utils\Constants::DBC_STAFF_ROLE_ID => $role->role->id,
                            \App\Utils\Constants::DBC_ACAD_SESS_ID => $role->academic_session->id
                            ]) }}"> {{ 'View' }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
