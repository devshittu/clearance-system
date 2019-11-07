@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">

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
                            <td><a href="{{ route('show_desk', [
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
