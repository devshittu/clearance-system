@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-warning">Attention! You may have to meet with us at {{$role->title}} unit to further settle your cases. </div>
                <div class="well container">

                    <div class="pull-left">
                    <h3>Your {{$role->title}} unit log </h3>
                    </div>
                    <div class="pull-right">
                    <h3>{{ \Illuminate\Support\Facades\Auth::user()->reg_code }} </h3>
                    </div>

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
                                <td colspan="2">
                                    @if ($item_log->is_fixed)
                                        {{--<div class="bg-success" style="display: block;width: 16px;height: 16px;"></div> --}}
                                        <div class="alert alert-success">Settled</div>
                                    @else
                                        {{--<span class="bg-danger" style="display: block;width: 16px;height: 16px;"></span>--}}
                                        <div class="alert alert-danger">Unsettled</d>
                                    @endif
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
