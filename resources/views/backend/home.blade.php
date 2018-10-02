@extends('layouts.admin')

@section('content')

<div class="market-updates">
    <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-8 market-update-left">
                <h3>{{ Auth::user()->count() }}</h3>
                <h4>User Terdaftar</h4>
                <p>Other hand, we denounce</p>
            </div>
            <div class="col-md-4 market-update-right">
                <i class="fa fa-file-text-o"> </i>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-8 market-update-left">
                <h3>135</h3>
                <h4>Daily Visitors</h4>
                <p>Other hand, we denounce</p>
            </div>
            <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-8 market-update-left">
                <h3>23</h3>
                <h4>New Messages</h4>
                <p>Other hand, we denounce</p>
            </div>
            <div class="col-md-4 market-update-right">
                <i class="fa fa-envelope-o"> </i>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
        <div class="work-progres">
            <div class="chit-chat-heading">
                Daftar User
            </div>
            <div class="table-responsive">
                <form action="" method="post" id="form_aksi"></form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>

                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($i=1)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
    
                                @if ($user->role==='admin')
                                <td><span class="label label-danger">{{$user->role}}</span></td>
                                @else
                                <td><span class="label label-success">{{$user->role}}</span></td>
                                @endif
                                <td><a href="/backend/user/{{$user->id}}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger"  type="button" form="form_aksi"><i class="fa fa-trash-o"></i></button></td>
                            </tr>
                            @php($i++)
                        @endforeach
                        {{-- <tr>
                            <td>1</td>
                            <td>Face book</td>
                            <td>Malorum</td>

                            <td><span class="label label-danger">in progress</span></td>
                            <td><span class="badge badge-info">50%</span></td>
                        </tr>
                        <tr>
                            

                            <td>2</td>
                            <td>Twitter</td>
                            <td>Evan</td>

                            <td><span class="label label-success">completed</span></td>
                            <td><span class="badge badge-success">100%</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Google</td>
                            <td>John</td>

                            <td><span class="label label-warning">in progress</span></td>
                            <td><span class="badge badge-warning">75%</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>LinkedIn</td>
                            <td>Danial</td>

                            <td><span class="label label-info">in progress</span></td>
                            <td><span class="badge badge-info">65%</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Tumblr</td>
                            <td>David</td>

                            <td><span class="label label-warning">in progress</span></td>
                            <td><span class="badge badge-danger">95%</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Tesla</td>
                            <td>Mickey</td>

                            <td><span class="label label-info">in progress</span></td>
                            <td><span class="badge badge-success">95%</span></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>

@endsection
