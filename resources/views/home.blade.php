@extends('layouts.app')



@section('content')



    @if (Auth::user()->type === 'admin')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                                    <br>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">SN</th>
                                            <th scope="col">REG CODE</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (count($users) == 0)
                                            <p>No user exist {{ $user->id }}</p>
                                            @else
                                                @foreach ($users as $u)
                                            <tr>
                                                <th scope="row">{{ $u->id }}</th>
                                                <td>{{ $u->reg_code }}</td>
                                                <td>{{ $u->first_name . ' ' . $u->last_name }}</td>
                                                <td><a href="{{ $u->id }}" class="btn btn-dark btn-sm"> View</a> </td>
                                            </tr>
                                            @endforeach

                                        @endif
                                        </tbody>
                                    </table>
                                    <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint minim consectetur qui.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ $user }}
                            You are logged in as Admin!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->type === 'student')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{ $user }}
                                You are logged in as student!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->type === 'staff')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{ Auth::user() ?? '' }}
                                You are logged in as student!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @elseif (Auth::user()->type === 'candidate')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Exam Schedule</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        {{--Profile Tab...--}}
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Personal Details</th>
                                {{--<th scope="col">First</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">REG NO</th>
                                <td>{{ Auth::user()->reg_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Full Name</th>
                                <td>{{ Auth::user()->first_name  . ' ' .  Auth::user()->last_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ Auth::user()->gender }}</td>
                            </tr>
                            <tr>
                                <th scope="row">User Type</th>
                                <td>{{ Auth::user()->type}}</td>
                            </tr>
                            {{--<tr>
                                <th scope="row"></th>
                                <td>{{ Auth::user()-> }}</td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        ... Home tab
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Exam Schedule</th>
                                {{--<th scope="col">First</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Exam Date</th>
                                <td>{{ Auth::user()->type }} 28-Dec-2019</td>
                            </tr>
                            <tr>
                                <th scope="row">Time</th>
                                <td>{{ Auth::user()->type }} 12:00 pm</td>
                            </tr>
                            {{--<tr>
                                <th scope="row"></th>
                                <td>{{ Auth::user()-> }}</td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
